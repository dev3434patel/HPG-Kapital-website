<?php
/**
 * Vercel Serverless Function Entry Point
 * 
 * This is a thin wrapper for Vercel that includes the main index.php from root
 * Vercel requires PHP files to be in the api/ directory for serverless functions
 */

// Check if this is a static file request and serve it directly
$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
$parsedUri = parse_url($requestUri, PHP_URL_PATH);

// Serve static files from public directory
if (preg_match('#^/assets/#', $parsedUri) || $parsedUri === '/favicon.ico') {
    $publicPath = __DIR__ . '/../public' . $parsedUri;
    if ($parsedUri === '/favicon.ico') {
        $publicPath = __DIR__ . '/../public/assets/images/favicon.ico';
    }
    
    if (file_exists($publicPath) && is_file($publicPath)) {
        // Determine MIME type
        $mimeType = mime_content_type($publicPath);
        if ($mimeType) {
            header('Content-Type: ' . $mimeType);
        }
        header('Content-Length: ' . filesize($publicPath));
        readfile($publicPath);
        exit;
    }
}

// Ensure proper headers for HTML responses
if (!headers_sent()) {
    header('Content-Type: text/html; charset=UTF-8');
}

// Change to project root and include the main index.php
$rootDir = realpath(__DIR__ . '/..');
if ($rootDir && is_dir($rootDir)) {
    chdir($rootDir);
    // Include the main application entry point (this handles all initialization and routing)
    require_once $rootDir . '/index.php';
} else {
    http_response_code(500);
    die('Application root directory not found');
}

