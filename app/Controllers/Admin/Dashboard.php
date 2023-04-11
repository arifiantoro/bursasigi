<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $db = db_connect();

        $hitungMember = $db->query('SELECT count(id) as member from pencari')->getFirstRow()->member;
        $hitungusaha = $db->query('SELECT count(id) as perusahaan from perusahaan')->getFirstRow()->perusahaan;
        
        return view('admin/nav/header') .view('admin/dashboard', ['member' => $hitungMember, 'usaha' => $hitungusaha]) .view('admin/nav/footer');
    }
}
