<?php
/**
 * Main Entry Point - Root Level
 * 
 * Traditional PHP structure with index.php in root
 * This works for both traditional hosting and Vercel (via api/index.php)
 */

// Configure secure session BEFORE starting session
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
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
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
ini_set('log_errors', 1);

// Error logging - use /tmp for serverless, storage for traditional
$errorLogPath = '/tmp/php_errors.log';
if (is_writable('/tmp')) {
    ini_set('error_log', $errorLogPath);
} else {
    $storagePath = __DIR__ . '/storage';
    if (is_dir($storagePath)) {
        ini_set('error_log', $storagePath . '/php_errors.log');
    }
}

// Load config
try {
    $config = require __DIR__ . '/app/Config/config.php';
    $env = $config['app_env'] ?? 'production';
    
    // Only enable error display in development mode
    if ($env === 'development') {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
    } else {
        error_reporting(E_ALL);
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
    }
} catch (Exception $e) {
    $env = $_ENV['APP_ENV'] ?? 'production';
    if ($env === 'development') {
        die("Configuration error: " . $e->getMessage());
    } else {
        error_log("Configuration error: " . $e->getMessage());
        die("Configuration error. Please contact the administrator.");
    }
}

// Autoloader
require_once __DIR__ . '/app/Core/Autoloader.php';
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
        $auth = new \App\Core\Middleware\AuthMiddleware();
        if ($auth->handle()) {
            $controller->markRead($matches[1]);
        }
    }
    exit;
}

// Set up error handler
set_error_handler(function($errno, $errstr, $errfile, $errline) {
    error_log("PHP Error [{$errno}]: {$errstr} in {$errfile} on line {$errline}");
    
    $config = require __DIR__ . '/app/Config/config.php';
    if (($config['app_env'] ?? 'production') === 'production') {
        http_response_code(500);
        $controller = new \App\Controllers\ErrorController();
        $controller->serverError();
        exit;
    }
    
    return false;
});

// Set up exception handler
set_exception_handler(function($exception) {
    error_log("Uncaught Exception: " . $exception->getMessage() . " in " . $exception->getFile() . " on line " . $exception->getLine());
    
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
                        exit;
                    }
                }
                $controller->$methodName();
                exit;
            }
        }
    }
} catch (\Exception $e) {
    throw $e;
}

// 404 Not Found
http_response_code(404);
$controller = new \App\Controllers\ErrorController();
$controller->notFound();

