<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $db = db_connect();
        $profil = $db->table('pencari')->where('user_id', user()->id)->get()->getFirstRow();
       

        return view('pencari/nav/header').view('pencari/dashboard', ['profil' => $profil]).view('pencari/nav/footer');
    }
}
