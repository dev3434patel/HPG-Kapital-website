<?php

namespace App\Core;

class Email
{
    private $config;

    public function __construct()
    {
        $this->config = require __DIR__ . '/../Config/config.php';
    }

    public function sendContactNotification($name, $email, $phone, $message)
    {
        if (!$this->config['smtp_enabled'] || empty($this->config['admin_email'])) {
            return false;
        }

        $subject = "New Contact Form Submission from {$name}";
        $body = $this->buildEmailBody($name, $email, $phone, $message);

        // Use PHPMailer if available, otherwise fall back to mail()
        if (class_exists('\PHPMailer\PHPMailer\PHPMailer')) {
            return $this->sendWithPHPMailer($subject, $body);
        } else {
            return $this->sendWithMail($subject, $body, $name, $email);
        }
    }

    private function buildEmailBody($name, $email, $phone, $message)
    {
        $html = "<h2>New Contact Form Submission</h2>";
        $html .= "<p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>";
        $html .= "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
        if ($phone) {
            $html .= "<p><strong>Phone:</strong> " . htmlspecialchars($phone) . "</p>";
        }
        $html .= "<p><strong>Message:</strong></p>";
        $html .= "<p>" . nl2br(htmlspecialchars($message)) . "</p>";
        $html .= "<hr>";
        $html .= "<p><small>Submitted: " . date('Y-m-d H:i:s T') . "</small></p>";

        return $html;
    }

    private function sendWithPHPMailer($subject, $body)
    {
        try {
            $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
            
            $mail->isSMTP();
            $mail->Host = $this->config['smtp_host'];
            $mail->SMTPAuth = true;
            $mail->Username = $this->config['smtp_user'];
            $mail->Password = $this->config['smtp_pass'];
            $mail->SMTPSecure = $this->config['smtp_port'] === 465 ? 'ssl' : 'tls';
            $mail->Port = $this->config['smtp_port'];

            $mail->setFrom($this->config['smtp_from_email'], $this->config['smtp_from_name']);
            $mail->addAddress($this->config['admin_email']);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;

            return $mail->send();
        } catch (\Exception $e) {
            error_log("Email error: " . $e->getMessage());
            return false;
        }
    }

    private function sendWithMail($subject, $body, $name, $fromEmail)
    {
        $to = $this->config['admin_email'];
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "From: {$this->config['smtp_from_name']} <{$this->config['smtp_from_email']}>\r\n";
        $headers .= "Reply-To: {$name} <{$fromEmail}>\r\n";

        return mail($to, $subject, $body, $headers);
    }
}

