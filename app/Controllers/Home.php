<?php

namespace App\Controllers;
use Config\Services;

class Home extends BaseController
{
    function __construct()
    {
        Services::session();
    }

    public function index()
    {
        if (!Services::session()->get("nik")) {
            return redirect()->to(base_url('login'));
        }

        return view('index');
    }

    public function login() 
    {
        if (Services::session()->get('nik')) {
            return redirect()->to(base_url('/'));
        }

        return view('login');
    }

    public function register()
    {
        if (Services::session()->get('nik')){
            return redirect()->to(base_url('/'));
        }

        return view('register');
    }
}