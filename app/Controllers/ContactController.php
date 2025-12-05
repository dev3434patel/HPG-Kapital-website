<?php

namespace App\Controllers;

use App\Models\Submission;
use App\Core\Security;
use App\Core\Email;

class ContactController extends BaseController
{
    public function showForm()
    {
        $this->view->render('contact', [
            'title' => 'Contact Us - HPG Kapital',
            'csrfToken' => $this->getCsrfToken(),
            'errors' => [],
            'success' => false,
        ]);
    }

    public function submit()
    {
        $this->validateCsrf();

        // Rate limiting
        $config = require __DIR__ . '/../Config/config.php';
        $rateLimit = Security::checkRateLimit(
            'contact',
            $config['rate_limit_contact'],
            $config['rate_limit_window']
        );

        if (!$rateLimit['allowed']) {
            $this->view->render('contact', [
                'title' => 'Contact Us - HPG Kapital',
                'csrfToken' => $this->getCsrfToken(),
                'errors' => ['rate_limit' => 'Too many requests. Please try again later.'],
                'success' => false,
            ]);
            return;
        }

        // Get and validate input
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $message = $_POST['message'] ?? '';

        $errors = $this->validateInput($name, $email, $phone, $message);

        if (!empty($errors)) {
            $this->view->render('contact', [
                'title' => 'Contact Us - HPG Kapital',
                'csrfToken' => $this->getCsrfToken(),
                'errors' => $errors,
                'success' => false,
                'formData' => [
                    'name' => Security::sanitizeInput($name),
                    'email' => Security::sanitizeInput($email),
                    'phone' => Security::sanitizeInput($phone),
                    'message' => Security::sanitizeInput($message),
                ],
            ]);
            return;
        }

        // Sanitize inputs
        $name = Security::sanitizeInput($name);
        $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
        $phone = $phone ? Security::sanitizeInput($phone) : null;
        $message = Security::sanitizeInput($message);

        // Save to database
        try {
            $submission = new Submission();
            $submission->create($name, $email, $phone, $message);

            // Send email notification (if configured)
            $emailService = new Email();
            $emailService->sendContactNotification($name, $email, $phone, $message);

            $this->view->render('contact', [
                'title' => 'Contact Us - HPG Kapital',
                'csrfToken' => $this->getCsrfToken(),
                'errors' => [],
                'success' => true,
                'successMessage' => "Thank you! We'll be in touch soon.",
                'formData' => [], // Clear form data on success
            ]);
        } catch (\Exception $e) {
            error_log("Contact form error: " . $e->getMessage());
            $this->view->render('contact', [
                'title' => 'Contact Us - HPG Kapital',
                'csrfToken' => $this->getCsrfToken(),
                'errors' => ['general' => 'An error occurred. Please try again later.'],
                'success' => false,
            ]);
        }
    }

    private function validateInput($name, $email, $phone, $message)
    {
        $errors = [];

        // Name validation
        if (empty(trim($name))) {
            $errors['name'] = 'Name is required';
        } elseif (strlen(trim($name)) > 100) {
            $errors['name'] = 'Name must be less than 100 characters';
        } elseif (!preg_match('/^[a-zA-Z\s\-\'\.]+$/', trim($name))) {
            $errors['name'] = 'Name contains invalid characters';
        }

        // Email validation
        if (empty(trim($email))) {
            $errors['email'] = 'Email is required';
        } elseif (strlen(trim($email)) > 255) {
            $errors['email'] = 'Email must be less than 255 characters';
        } elseif (!Security::validateEmail($email)) {
            $errors['email'] = 'Invalid email format';
        }

        // Phone validation (optional)
        if (!empty($phone) && strlen(trim($phone)) > 20) {
            $errors['phone'] = 'Phone must be less than 20 characters';
        } elseif (!empty($phone) && !preg_match('/^[\d\s\-\(\)\+\.]+$/', trim($phone))) {
            $errors['phone'] = 'Invalid phone number format';
        }

        // Message validation
        if (empty(trim($message))) {
            $errors['message'] = 'Message is required';
        } elseif (strlen(trim($message)) > 5000) {
            $errors['message'] = 'Message must be less than 5000 characters';
        }

        return $errors;
    }
}

