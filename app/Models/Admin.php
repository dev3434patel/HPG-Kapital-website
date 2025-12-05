<?php

namespace App\Models;

use App\Core\FileStorage;

class Admin
{
    private $storage;
    private $filename = 'admins.json';

    public function __construct()
    {
        $this->storage = new FileStorage();
        $this->initializeDefaultAdmin();
    }

    private function initializeDefaultAdmin()
    {
        $admins = $this->storage->read($this->filename);
        
        // SECURITY: Only create default admin if explicitly enabled via environment variable
        // This prevents hardcoded credentials in production
        $config = require __DIR__ . '/../Config/config.php';
        $allowDefaultAdmin = isset($_ENV['ALLOW_DEFAULT_ADMIN']) && $_ENV['ALLOW_DEFAULT_ADMIN'] === 'true';
        
        // Create default admin ONLY if explicitly enabled AND file is empty
        if (empty($admins) && $allowDefaultAdmin && $config['app_env'] === 'development') {
            // WARNING: Default credentials should be changed immediately after first login
            $defaultEmail = $_ENV['DEFAULT_ADMIN_EMAIL'] ?? 'admin@hpg-kapital.com';
            $defaultPassword = $_ENV['DEFAULT_ADMIN_PASSWORD'] ?? 'admin123';
            
            $defaultAdmin = [
                'id' => uniqid('admin_', true),
                'email' => $defaultEmail,
                'password_hash' => password_hash($defaultPassword, PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ];
            
            $this->storage->write($this->filename, [$defaultAdmin]);
            
            // Log warning in development
            if ($config['app_env'] === 'development') {
                error_log("WARNING: Default admin created. Change password immediately!");
            }
        }
    }

    public function findByEmail($email)
    {
        $admins = $this->storage->read($this->filename);
        
        foreach ($admins as $admin) {
            if (isset($admin['email']) && strtolower($admin['email']) === strtolower($email)) {
                return $admin;
            }
        }
        
        return null;
    }

    public function verifyPassword($password, $hash)
    {
        return password_verify($password, $hash);
    }

    public function create($email, $password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $admin = [
            'id' => uniqid('admin_', true),
            'email' => $email,
            'password_hash' => $hash,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $admins = $this->storage->read($this->filename);
        $admins[] = $admin;
        $this->storage->write($this->filename, $admins);
        
        return $admin['id'];
    }
}
