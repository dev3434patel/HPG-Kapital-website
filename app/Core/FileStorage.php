<?php

namespace App\Core;

class FileStorage
{
    private $dataDir;

    public function __construct()
    {
        $config = require __DIR__ . '/../Config/config.php';
        
        // On Vercel, use /tmp for writable storage (data won't persist between deployments)
        $isVercel = !empty($_ENV['VERCEL']) || !empty($_SERVER['VERCEL']);
        if ($isVercel && is_writable('/tmp')) {
            $this->dataDir = '/tmp/data';
        } else {
            $this->dataDir = $config['data_path'];
        }
        
        // Ensure data directory exists
        if (!is_dir($this->dataDir)) {
            mkdir($this->dataDir, 0755, true);
        }
    }

    public function read($filename)
    {
        $filepath = $this->dataDir . '/' . $filename;
        
        if (!file_exists($filepath)) {
            return [];
        }

        $content = file_get_contents($filepath);
        $data = json_decode($content, true);
        
        return $data !== null ? $data : [];
    }

    public function write($filename, $data)
    {
        $filepath = $this->dataDir . '/' . $filename;
        
        // Ensure directory exists
        $dir = dirname($filepath);
        if (!is_dir($dir)) {
            if (!mkdir($dir, 0755, true)) {
                throw new \Exception("Cannot create directory: {$dir}");
            }
        }
        
        // Use file locking to prevent concurrent writes
        // Retry logic for lock acquisition
        $maxRetries = 5;
        $retryDelay = 100000; // 100ms in microseconds
        $fp = null;
        
        for ($attempt = 0; $attempt < $maxRetries; $attempt++) {
            $fp = fopen($filepath, 'c+');
            
            if (!$fp) {
                if ($attempt < $maxRetries - 1) {
                    usleep($retryDelay);
                    continue;
                }
                throw new \Exception("Cannot open file for writing: {$filename} after {$maxRetries} attempts");
            }
            
            // Try to acquire exclusive lock (non-blocking on first attempt, blocking on retries)
            $lockMode = $attempt === 0 ? LOCK_EX | LOCK_NB : LOCK_EX;
            
            if (flock($fp, $lockMode)) {
                try {
                    ftruncate($fp, 0);
                    rewind($fp);
                    $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                    
                    if ($json === false) {
                        throw new \Exception("JSON encoding failed: " . json_last_error_msg());
                    }
                    
                    $written = fwrite($fp, $json);
                    if ($written === false) {
                        throw new \Exception("Failed to write to file: {$filename}");
                    }
                    
                    fflush($fp);
                    flock($fp, LOCK_UN);
                    fclose($fp);
                    return true;
                } catch (\Exception $e) {
                    flock($fp, LOCK_UN);
                    fclose($fp);
                    throw $e;
                }
            } else {
                fclose($fp);
                if ($attempt < $maxRetries - 1) {
                    usleep($retryDelay);
                } else {
                    throw new \Exception("Cannot acquire file lock: {$filename} after {$maxRetries} attempts");
                }
            }
        }
        
        return false;
    }

    public function append($filename, $item)
    {
        $data = $this->read($filename);
        $data[] = $item;
        return $this->write($filename, $data);
    }

    public function update($filename, $id, $updates, $idField = 'id')
    {
        $data = $this->read($filename);
        
        foreach ($data as &$item) {
            if (isset($item[$idField]) && $item[$idField] == $id) {
                $item = array_merge($item, $updates);
                return $this->write($filename, $data);
            }
        }
        
        return false;
    }

    public function find($filename, $id, $idField = 'id')
    {
        $data = $this->read($filename);
        
        foreach ($data as $item) {
            if (isset($item[$idField]) && $item[$idField] == $id) {
                return $item;
            }
        }
        
        return null;
    }

    public function findAll($filename, $callback = null)
    {
        $data = $this->read($filename);
        
        if ($callback === null) {
            return $data;
        }
        
        return array_filter($data, $callback);
    }

    public function delete($filename, $id, $idField = 'id')
    {
        $data = $this->read($filename);
        $filtered = array_filter($data, function($item) use ($id, $idField) {
            return !isset($item[$idField]) || $item[$idField] != $id;
        });
        
        return $this->write($filename, array_values($filtered));
    }
}

