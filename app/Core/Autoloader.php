<?php

namespace App\Core;

class Autoloader
{
    private static $basePath;

    public static function load($className)
    {
        // Get base path (project root directory)
        // From app/Core/Autoloader.php, go up 2 levels to root
        // __DIR__ = app/Core/, so dirname(__DIR__, 2) = root/
        if (!isset(self::$basePath)) {
            // Use realpath to resolve any symlinks or relative paths
            self::$basePath = realpath(dirname(__DIR__, 2)) ?: dirname(__DIR__, 2);
        }

        // Remove namespace prefix
        $className = str_replace('App\\', '', $className);
        
        // Convert namespace to file path
        $file = self::$basePath . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';

        if (file_exists($file)) {
            require_once $file;
            return true;
        }

        return false;
    }
}

