<?php

namespace App\Models;

use App\Core\FileStorage;

class Submission
{
    private $storage;
    private $filename = 'submissions.json';

    public function __construct()
    {
        $this->storage = new FileStorage();
    }

    public function create($name, $email, $phone, $message)
    {
        $submission = [
            'id' => uniqid('sub_', true),
            'name' => $name,
            'email' => $email,
            'phone' => $phone ?: null,
            'message' => $message,
            'is_read' => false,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $this->storage->append($this->filename, $submission);
        return $submission['id'];
    }

    public function getAll($orderBy = 'created_at DESC')
    {
        $submissions = $this->storage->read($this->filename);
        
        // Sort submissions
        usort($submissions, function($a, $b) use ($orderBy) {
            if (strpos($orderBy, 'created_at DESC') !== false) {
                return strtotime($b['created_at']) - strtotime($a['created_at']);
            } elseif (strpos($orderBy, 'created_at ASC') !== false) {
                return strtotime($a['created_at']) - strtotime($b['created_at']);
            }
            return 0;
        });
        
        return $submissions;
    }

    public function getById($id)
    {
        return $this->storage->find($this->filename, $id);
    }

    public function markAsRead($id)
    {
        return $this->storage->update($this->filename, $id, ['is_read' => true]);
    }

    public function markAsUnread($id)
    {
        return $this->storage->update($this->filename, $id, ['is_read' => false]);
    }

    public function getUnreadCount()
    {
        $submissions = $this->storage->read($this->filename);
        $unread = array_filter($submissions, function($submission) {
            return !isset($submission['is_read']) || !$submission['is_read'];
        });
        
        return count($unread);
    }
}
