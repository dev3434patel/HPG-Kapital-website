<?php
/**
 * Vercel Serverless Function Entry Point
 * 
 * This is a thin wrapper for Vercel that includes the main index.php from root
 * Vercel requires PHP files to be in the api/ directory for serverless functions
 */

// Ensure proper headers
if (!headers_sent()) {
    header('Content-Type: text/html; charset=UTF-8');
}

// Change to project root and include the main index.php
$rootDir = realpath(__DIR__ . '/..');
if ($rootDir && is_dir($rootDir)) {
    chdir($rootDir);
    // Include the main application entry point
    require_once $rootDir . '/index.php';
} else {
    http_response_code(500);
    die('Application root directory not found');
}

// Configure secure session BEFORE starting session
// Vercel always serves over HTTPS, so check for Vercel or HTTPS
$isVercel = !empty($_ENV['VERCEL']) || !empty($_SERVER['VERCEL']);
$isHttps = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') || 
           (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ||
           $isVercel;
if ($isHttps) {
    ini_set('session.cookie_secure', 1);
}
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_samesite', 'Strict');

// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Set timezone
date_default_timezone_set('America/New_York');

// SECURITY: Default to production-safe error settings
// Errors will be logged but not displayed by default
error_reporting(E_ALL);
ini_set('display_errors', 0); // Default to OFF for security
ini_set('display_startup_errors', 0);
ini_set('log_errors', 1);
// Use /tmp for error log in serverless environment (Vercel allows writes to /tmp)
$errorLogPath = '/tmp/php_errors.log';
if (is_writable('/tmp')) {
    ini_set('error_log', $errorLogPath);
} else {
    // Fallback to project storage if /tmp not available
    $storagePath = __DIR__ . '/../storage';
    if (is_dir($storagePath) && is_writable($storagePath)) {
        ini_set('error_log', $storagePath . '/php_errors.log');
    }
}

// Load config
try {
    $config = require __DIR__ . '/../app/Config/config.php';
    $env = $config['app_env'] ?? 'production';
    
    // Only enable error display in development mode
    if ($env === 'development') {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
    } else {
        // Production: Log errors but never display them
        error_reporting(E_ALL); // Still log all errors
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
    }
} catch (Exception $e) {
    // Even config errors should not expose details in production
    $env = $_ENV['APP_ENV'] ?? 'production';
    if ($env === 'development') {
        die("Configuration error: " . $e->getMessage());
    } else {
        error_log("Configuration error: " . $e->getMessage());
        die("Configuration error. Please contact the administrator.");
    }
}

// Autoloader
require_once __DIR__ . '/../app/Core/Autoloader.php';
spl_autoload_register(['App\Core\Autoloader', 'load']);

// Simple routing based on URI
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$uri = rtrim($uri, '/') ?: '/';
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

// Route mapping
$routes = [
    'GET' => [
        '/' => 'HomeController@index',
        '/about' => 'PageController@about',
        '/capital-markets' => 'PageController@capitalMarkets',
        '/eb5-advisory' => 'PageController@eb5Advisory',
        '/loan-products' => 'PageController@loanProducts',
        '/hospitality-financing' => 'PageController@hospitalityFinancing',
        '/gc-referral' => 'PageController@gcReferral',
        '/contact' => 'ContactController@showForm',
        '/admin' => 'AdminController@redirectToLogin',
        '/admin/login' => 'AdminController@showLogin',
        '/admin/dashboard' => 'AdminController@dashboard',
    ],
    'POST' => [
        '/contact' => 'ContactController@submit',
        '/admin/login' => 'AdminController@login',
        '/admin/logout' => 'AdminController@logout',
    ],
];

// Handle dynamic routes (like /admin/submissions/{id}/read)
if ($method === 'POST' && preg_match('#^/admin/submissions/([^/]+)/read$#', $uri, $matches)) {
    $controller = new \App\Controllers\AdminController();
    if (method_exists($controller, 'markRead')) {
        // Check auth
        $auth = new \App\Core\Middleware\AuthMiddleware();
        if ($auth->handle()) {
            $controller->markRead($matches[1]);
        }
    }
    exit;
}

// Set up error handler
set_error_handler(function($errno, $errstr, $errfile, $errline) {
    // Log error
    error_log("PHP Error [{$errno}]: {$errstr} in {$errfile} on line {$errline}");
    
    // In production, show 500 page
    $config = require __DIR__ . '/../app/Config/config.php';
    if (($config['app_env'] ?? 'production') === 'production') {
        http_response_code(500);
        $controller = new \App\Controllers\ErrorController();
        $controller->serverError();
        exit;
    }
    
    // In development, let PHP handle it
    return false;
});

// Set up exception handler
set_exception_handler(function($exception) {
    // Log exception
    error_log("Uncaught Exception: " . $exception->getMessage() . " in " . $exception->getFile() . " on line " . $exception->getLine());
    
    // Show 500 page
    http_response_code(500);
    $controller = new \App\Controllers\ErrorController();
    $controller->serverError();
    exit;
});

// Simple route matching
try {
    if (isset($routes[$method][$uri])) {
        $handler = $routes[$method][$uri];
        list($controllerName, $methodName) = explode('@', $handler);
        $controllerClass = "App\\Controllers\\{$controllerName}";
        
        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();
            if (method_exists($controller, $methodName)) {
                // Check for auth middleware on protected routes
                if (strpos($uri, '/admin/dashboard') === 0) {
                    $auth = new \App\Core\Middleware\AuthMiddleware();
                    if (!$auth->handle()) {
                        exit; // Redirect handled in middleware
                    }
                }
                $controller->$methodName();
                exit;
            }
        }
    }
} catch (\Exception $e) {
    // Exception caught, will be handled by exception handler
    throw $e;
}

// 404 Not Found
http_response_code(404);
$controller = new \App\Controllers\ErrorController();
$controller->notFound();

