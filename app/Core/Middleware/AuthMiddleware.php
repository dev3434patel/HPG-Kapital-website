<?php

namespace App\Core\Middleware;

class AuthMiddleware
{
    public function handle()
    {
        if (!isset($_SESSION['admin_id']) || !isset($_SESSION['admin_email'])) {
            header('Location: /admin/login');
            exit;
        }
        
        // Check session timeout (30 minutes of inactivity)
        $config = require __DIR__ . '/../../Config/config.php';
        $sessionTimeout = $config['session_timeout'] ?? 1800; // 30 minutes default
        
        if (isset($_SESSION['last_activity'])) {
            $timeSinceLastActivity = time() - $_SESSION['last_activity'];
            
            if ($timeSinceLastActivity > $sessionTimeout) {
                // Session expired
                session_destroy();
                header('Location: /admin/login?error=session_expired');
                exit;
            }
        }
        
        // Update last activity timestamp
        $_SESSION['last_activity'] = time();
        
        return true;
    }
}

