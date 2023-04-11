<?php

namespace App\Controllers\Perusahaan;

use App\Controllers\BaseController;

class Profil extends BaseController
{
    public function index()
    {
        $db = db_connect();
        $user = $db->table('users')->where('id', user()->id)->get()->getResult();
        $perusahaan = new \App\Models\OpenModel();
        $perusahaan->setTables('perusahaan');
        $per = $perusahaan->select('perusahaan.*, users.id as id')
            ->join('users', 'perusahaan.user_id = users.id', 'LEFT')
            ->where('user_id', user()->id)
            ->first();
        // dd($per);

        return view('perusahaan/nav/header') . view('perusahaan/profil/view', ['user' => $user, 'perusahaan' => $per]) . view('perusahaan/nav/footer');
    }

    public function edit()
    {
        $db = db_connect();
        $user = $db->table('users')->where('id', user()->id)->get()->getResult();
        $perusahaan = new \App\Models\OpenModel();
        $perusahaan->setTables('perusahaan');
        $per = $perusahaan->select('perusahaan.*, users.id as id')
            ->join('users', 'perusahaan.user_id = users.id', 'LEFT')
            ->where('user_id', user()->id)
            ->first();
        return view('perusahaan/nav/header') . view('perusahaan/profil/atur-profile', ['user' => $user, 'perusahaan' => $per]) . view('perusahaan/nav/footer');
    }
}
