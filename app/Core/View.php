<?php

namespace App\Core;

class View
{
    private $config;

    public function __construct()
    {
        $this->config = require __DIR__ . '/../Config/config.php';
    }

    public function render($viewName, $data = [], $layout = 'main')
    {
        // Make $view available in all templates (use different name to avoid conflict)
        $data['view'] = $this;
        
        // Extract data array to variables
        extract($data);

        // Start output buffering
        ob_start();

        // Include the view file (use $viewName to avoid conflict with extracted $view)
        $viewFile = $this->config['views_path'] . '/' . $viewName . '.php';
        if (!file_exists($viewFile)) {
            throw new \Exception("View file not found: {$viewName}");
        }

        include $viewFile;
        $content = ob_get_clean();

        // Include layout (with $view and $content available)
        $layoutFile = $this->config['views_path'] . '/layouts/' . $layout . '.php';
        if (!file_exists($layoutFile)) {
            throw new \Exception("Layout file not found: {$layout}");
        }

        include $layoutFile;
    }

    public function partial($partial, $data = [])
    {
        // Make $view available in partials
        $data['view'] = $this;
        extract($data);
        $partialFile = $this->config['views_path'] . '/partials/' . $partial . '.php';
        if (file_exists($partialFile)) {
            include $partialFile;
        }
    }

    public function asset($path)
    {
        // Simple relative path when running from public directory
        return '/assets/' . ltrim($path, '/');
    }

    public function url($path = '')
    {
        // Simple relative path when running from public directory
        return '/' . ltrim($path, '/');
    }

    public function escape($string)
    {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }
}

