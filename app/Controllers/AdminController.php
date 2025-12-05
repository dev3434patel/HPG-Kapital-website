<?php

namespace App\Controllers;

use App\Models\Admin;
use App\Models\Submission;
use App\Core\Security;
use App\Core\Middleware\AuthMiddleware;

class AdminController extends BaseController
{
    public function redirectToLogin()
    {
        // Simply redirect to login - matches React Admin.tsx behavior
        $this->redirect('/admin/login');
    }

    public function showLogin()
    {
        // If already logged in, redirect to dashboard
        if (isset($_SESSION['admin_id'])) {
            $this->redirect('/admin/dashboard');
            return;
        }

        $this->view->render('admin/login', [
            'title' => 'Admin Login - HPG Kapital',
            'csrfToken' => $this->getCsrfToken(),
            'error' => $_GET['error'] ?? null,
        ]);
    }

    public function login()
    {
        $this->validateCsrf();

        // Rate limiting
        $config = require __DIR__ . '/../Config/config.php';
        $rateLimit = Security::checkRateLimit(
            'login',
            $config['rate_limit_login'],
            $config['rate_limit_login_window']
        );

        if (!$rateLimit['allowed']) {
            $this->redirect('/admin/login?error=rate_limit');
            return;
        }

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            $this->redirect('/admin/login?error=missing_fields');
            return;
        }

        // Validate email format
        if (!Security::validateEmail($email)) {
            $this->redirect('/admin/login?error=invalid_email');
            return;
        }

        $adminModel = new Admin();
        $admin = $adminModel->findByEmail($email);

        if (!$admin || !$adminModel->verifyPassword($password, $admin['password_hash'])) {
            $this->redirect('/admin/login?error=invalid_credentials');
            return;
        }

        // Regenerate session ID for security
        session_regenerate_id(true);

        // Set session variables
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_email'] = $admin['email'];
        $_SESSION['last_activity'] = time(); // Track activity for timeout

        $this->redirect('/admin/dashboard');
    }

    public function logout()
    {
        session_destroy();
        $this->redirect('/admin/login');
    }

    public function dashboard()
    {
        $submissionModel = new Submission();
        $allSubmissions = $submissionModel->getAll('created_at DESC');
        $unreadCount = $submissionModel->getUnreadCount();

        // Pagination
        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $perPage = 20;
        $total = count($allSubmissions);
        $totalPages = max(1, ceil($total / $perPage));
        $page = min($page, $totalPages);
        $offset = ($page - 1) * $perPage;
        $submissions = array_slice($allSubmissions, $offset, $perPage);

        $this->view->render('admin/dashboard', [
            'title' => 'Admin Dashboard - HPG Kapital',
            'submissions' => $submissions,
            'unreadCount' => $unreadCount,
            'csrfToken' => $this->getCsrfToken(),
            'pagination' => [
                'current_page' => $page,
                'total_pages' => $totalPages,
                'total_items' => $total,
                'per_page' => $perPage,
                'has_prev' => $page > 1,
                'has_next' => $page < $totalPages,
            ],
        ]);
    }

    public function markRead($id)
    {
        // Validate CSRF token
        $token = $_POST['csrf_token'] ?? '';
        if (!Security::validateCsrfToken($token)) {
            $this->json(['success' => false, 'message' => 'Invalid CSRF token'], 403);
            return;
        }

        $submissionModel = new Submission();
        $submission = $submissionModel->getById($id);

        if (!$submission) {
            $this->json(['success' => false, 'message' => 'Submission not found'], 404);
            return;
        }

        $action = $_POST['action'] ?? 'read';
        if ($action === 'read') {
            $submissionModel->markAsRead($id);
        } else {
            $submissionModel->markAsUnread($id);
        }

        $this->json(['success' => true]);
    }
}

