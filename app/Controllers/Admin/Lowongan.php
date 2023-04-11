<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Lowongan extends BaseController
{
    public function index()
    {
        return view('admin/nav/header').view('admin/lowongan/index').view('admin/nav/footer');
    }
}
