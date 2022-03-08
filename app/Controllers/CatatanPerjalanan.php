<?php

namespace App\Controllers;

use App\Models\User_model;
use App\Models\CatatanPerjalanan_model;
use App\Models\User;
use Config\Services;
use Tests\Support\Models\UserModel;

class CatatanPerjalanan extends BaseController
{
    function __construct()
    {
        Services::session();
    }

    public function index()
    {
        if (!Services::session()->get("nik")) {
            return redirect()->to(base_url('/login'));
        }

        $userdata = User::findByNIK(Services::session()->get("nik"));
        $data = [
            "userdata" => User::findByNIK(Services::session()->get("nik")),
            "catatan_perjalanan" => CatatanPerjalanan_model::getAll()
        ];

        return view("catatan_perjalanan", $data);
    }
}