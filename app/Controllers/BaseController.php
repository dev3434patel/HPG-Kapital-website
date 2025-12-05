<?php

namespace App\Controllers;

use App\Core\View;
use App\Core\Security;

abstract class BaseController
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    protected function json($data, $statusCode = 200)
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    protected function redirect($url)
    {
        header("Location: {$url}");
        exit;
    }

    protected function getCsrfToken()
    {
        return Security::generateCsrfToken();
    }

    protected function validateCsrf()
    {
        $token = $_POST['csrf_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';
        if (!Security::validateCsrfToken($token)) {
            $this->json(['success' => false, 'message' => 'Invalid CSRF token'], 403);
        }
    }
}

