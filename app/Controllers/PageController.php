<?php

namespace App\Controllers;

class PageController extends BaseController
{
    public function about()
    {
        $this->view->render('about', [
            'title' => 'About Us - HPG Kapital',
        ]);
    }

    public function capitalMarkets()
    {
        $this->view->render('capital-markets', [
            'title' => 'Capital Markets Advisory - HPG Kapital',
        ]);
    }

    public function eb5Advisory()
    {
        $this->view->render('eb5-advisory', [
            'title' => 'EB-5 Advisory - HPG Kapital',
        ]);
    }

    public function loanProducts()
    {
        $this->view->render('loan-products', [
            'title' => 'Loan Products - HPG Kapital',
        ]);
    }

    public function hospitalityFinancing()
    {
        $this->view->render('hospitality-financing', [
            'title' => 'Hospitality Financing - HPG Kapital',
        ]);
    }

    public function gcReferral()
    {
        $this->view->render('gc-referral', [
            'title' => 'Preferred GC Referral - HPG Kapital',
        ]);
    }
}

