<?php

namespace App\Controllers;

class ErrorController extends BaseController
{
    public function notFound()
    {
        http_response_code(404);
        $this->view->render('errors/404', [
            'title' => '404 - Page Not Found - HPG Kapital',
        ]);
    }

    public function serverError($message = null)
    {
        http_response_code(500);
        $this->view->render('errors/500', [
            'title' => '500 - Server Error - HPG Kapital',
            'message' => $message,
        ]);
    }
}

