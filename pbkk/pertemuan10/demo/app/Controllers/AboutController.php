<?php

namespace App\Controllers;

class AboutController extends BaseController
{
    public function index(): string
    {
        $data = [
            'title'  => 'Tentang Kami – ShopEase',
            'active' => 'about',
        ];

        return view('frontend/about', $data);
    }
}
