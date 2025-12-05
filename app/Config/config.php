<?php

// Load environment variables from .env file if it exists
$envFile = null;
if (file_exists(__DIR__ . '/../../.env')) {
    $envFile = __DIR__ . '/../../.env';
} elseif (file_exists(__DIR__ . '/../.env')) {
    $envFile = __DIR__ . '/../.env';
}

if ($envFile) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            $_ENV[trim($key)] = trim($value);
        }
    }
}

// Detect Vercel environment
$isVercel = !empty($_ENV['VERCEL']) || !empty($_SERVER['VERCEL']);
$isVercelPreview = !empty($_ENV['VERCEL_ENV']) && $_ENV['VERCEL_ENV'] === 'preview';
$isVercelProduction = !empty($_ENV['VERCEL_ENV']) && $_ENV['VERCEL_ENV'] === 'production';

// Auto-detect APP_URL from Vercel environment variables
$appUrl = null;
if ($isVercel) {
    // Vercel provides VERCEL_URL for all deployments (preview and production)
    if (!empty($_ENV['VERCEL_URL'])) {
        $appUrl = 'https://' . $_ENV['VERCEL_URL'];
    }
    // Production deployments can also use VERCEL_PROJECT_PRODUCTION_URL
    if ($isVercelProduction && !empty($_ENV['VERCEL_PROJECT_PRODUCTION_URL'])) {
        $appUrl = 'https://' . $_ENV['VERCEL_PROJECT_PRODUCTION_URL'];
    }
}

// Validate critical environment variables
$appEnv = $_ENV['APP_ENV'] ?? ($isVercel ? ($isVercelPreview ? 'preview' : 'production') : (php_sapi_name() === 'cli-server' ? 'development' : 'production'));
$requiredInProduction = ['APP_URL'];

if ($appEnv === 'production' && !$isVercel) {
    $missing = [];
    foreach ($requiredInProduction as $var) {
        if (empty($_ENV[$var])) {
            $missing[] = $var;
        }
    }
    
    if (!empty($missing)) {
        $missingList = implode(', ', $missing);
        error_log("WARNING: Missing required environment variables in production: {$missingList}");
        // Don't die in production, just log warning
    }
}

return [
    // Application Configuration
    'app_name' => 'HPG Kapital',
    'app_url' => $appUrl ?? $_ENV['APP_URL'] ?? 'http://localhost:8000',
    'app_env' => $appEnv,
    'timezone' => 'America/New_York',

    // Security
    'session_lifetime' => 86400, // 24 hours (absolute max)
    'session_timeout' => 1800, // 30 minutes of inactivity
    'csrf_token_name' => 'csrf_token',
    'rate_limit_contact' => 5, // requests
    'rate_limit_window' => 900, // 15 minutes in seconds
    'rate_limit_login' => 5,
    'rate_limit_login_window' => 900,

    // Email Configuration (optional)
    'smtp_enabled' => isset($_ENV['SMTP_HOST']) && !empty($_ENV['SMTP_HOST']),
    'smtp_host' => $_ENV['SMTP_HOST'] ?? '',
    'smtp_port' => (int)($_ENV['SMTP_PORT'] ?? 587),
    'smtp_user' => $_ENV['SMTP_USER'] ?? '',
    'smtp_pass' => $_ENV['SMTP_PASS'] ?? '',
    'smtp_from_email' => $_ENV['SMTP_FROM_EMAIL'] ?? $_ENV['SMTP_USER'] ?? '',
    'smtp_from_name' => $_ENV['SMTP_FROM_NAME'] ?? 'HPG Kapital Website',
    'admin_email' => $_ENV['ADMIN_EMAIL'] ?? '',

    // Paths - From app/Config/config.php, go up 2 levels to root
    // __DIR__ = app/Config/, so dirname(__DIR__, 2) = root/
    'base_path' => dirname(__DIR__, 2),
    'views_path' => dirname(__DIR__, 2) . '/app/Views',
    'public_path' => dirname(__DIR__, 2) . '/public',
    'assets_path' => dirname(__DIR__, 2) . '/public/assets',
    'data_path' => dirname(__DIR__, 2) . '/data',
];

