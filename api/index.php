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
    // Include the main application entry point (this handles all initialization and routing)
    require_once $rootDir . '/index.php';
} else {
    http_response_code(500);
    die('Application root directory not found');
}

