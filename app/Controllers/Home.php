<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $template = [
            'menu' => view('layout/menu'),
            'isi' => view('dashboard')
        ];

        return view('layout/main', $template);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('login'));
    }
}
