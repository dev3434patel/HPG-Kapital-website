<?php

namespace App\Core;

class Security
{
    public static function generateCsrfToken()
    {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    public static function validateCsrfToken($token)
    {
        if (!isset($_SESSION['csrf_token'])) {
            return false;
        }
        return hash_equals($_SESSION['csrf_token'], $token);
    }

    public static function sanitizeInput($input)
    {
        if (is_array($input)) {
            return array_map([self::class, 'sanitizeInput'], $input);
        }
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }

    public static function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function checkRateLimit($key, $maxAttempts, $windowSeconds)
    {
        $rateLimitFile = __DIR__ . '/../../storage/rate_limits.json';
        $rateLimits = [];

        if (file_exists($rateLimitFile)) {
            $rateLimits = json_decode(file_get_contents($rateLimitFile), true) ?: [];
        }

        $now = time();
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $rateLimitKey = "{$key}_{$ip}";

        // Clean old entries
        foreach ($rateLimits as $k => $data) {
            if ($now - $data['timestamp'] > $windowSeconds) {
                unset($rateLimits[$k]);
            }
        }

        // Check current rate limit
        if (isset($rateLimits[$rateLimitKey])) {
            $attempts = $rateLimits[$rateLimitKey]['attempts'];
            if ($attempts >= $maxAttempts) {
                $remaining = $windowSeconds - ($now - $rateLimits[$rateLimitKey]['timestamp']);
                return [
                    'allowed' => false,
                    'remaining' => max(0, $remaining),
                ];
            }
            $rateLimits[$rateLimitKey]['attempts']++;
        } else {
            $rateLimits[$rateLimitKey] = [
                'attempts' => 1,
                'timestamp' => $now,
            ];
        }

        // Save updated rate limits
        $dir = dirname($rateLimitFile);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        file_put_contents($rateLimitFile, json_encode($rateLimits));

        return ['allowed' => true];
    }
}

