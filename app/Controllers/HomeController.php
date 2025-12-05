<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        $this->view->render('home', [
            'title' => 'Home - HPG Kapital',
            'csrfToken' => $this->getCsrfToken(),
        ]);
    }
}

