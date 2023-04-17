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
        $per = $perusahaan->select('perusahaan.*, users.id as id, users.email as email')
            ->join('users', 'perusahaan.user_id = users.id', 'LEFT')
            ->where('user_id', user()->id)
            ->first();
        // dd($per);
        if (empty($per)) {
            return
                view('perusahaan/nav/header') . view('perusahaan/profil/viewempty', ['user' => $user, 'perusahaan' => $per]) . view('perusahaan/nav/footer');
        } else {
            return
                view('perusahaan/nav/header') . view('perusahaan/profil/view', ['user' => $user, 'perusahaan' => $per]) . view('perusahaan/nav/footer');
        }

        // return view('perusahaan/nav/header') . view('perusahaan/profil/view', ['user' => $user, 'perusahaan' => $per]) . view('perusahaan/nav/footer');
    }

    public function edit()
    {

        $db = db_connect();
        $user = $db->table('users')->where('id', user()->id)->get()->getResult();
        $perusahaan = new \App\Models\OpenModel();
        $perusahaan->setTables('perusahaan');
        $per = $perusahaan->select('perusahaan.*, users.id as id, users.email as email')
            ->join('users', 'perusahaan.user_id = users.id', 'LEFT')
            ->where('user_id', user()->id)
            ->first();

        // dd($per);

        if (empty($per)) {
            return
                view('perusahaan/nav/header') . view('perusahaan/profil/atur-profile', ['user' => $user, 'perusahaan' => $per]) . view('perusahaan/nav/footer');
        } else {
            return
                view('perusahaan/nav/header') . view('perusahaan/profil/edit-profile', ['user' => $user, 'perusahaan' => $per]) . view('perusahaan/nav/footer');
        }

        // return view('perusahaan/nav/header') . view('perusahaan/profil/atur-profile', ['user' => $user, 'perusahaan' => $per]) . view('perusahaan/nav/footer');
    }

    public function add()
    {

        // Memasukan Biodata Perusahaan

        $perusahaan = new \App\Models\OpenModel();
        $perusahaan->setTables('perusahaan');


        $data = [
            'user_id' =>  user()->id,
            'nama_perusahaan' =>  enkripkan($this->request->getPost('nama_perusahaan')),
            'alamat_perusahaan' =>  enkripkan($this->request->getPost('alamat')),
            'kota' =>  enkripkan($this->request->getPost('kota')),
            'bidang_usaha' =>  enkripkan($this->request->getPost('bidangusaha')),
            'telepon' => $this->request->getPost('telepon'),
            'deskripsi_usaha' =>  enkripkan($this->request->getPost('deskripsis')),
        ];
        // dd($data);
        $perusahaan->save($data);

        // dd($perusahaan);
        return 200;
    }

    public function update()
    {

        // Update Biodata Perusahaan
        $userId =
            user()->id;
        $perusahaan = new \App\Models\OpenModel();
        $perusahaan->setTables('perusahaan');


        $data = [
            // 'user_id' =>  user()->id,
            'nama_perusahaan' =>  enkripkan($this->request->getPost('nama_perusahaan')),
            'alamat_perusahaan' =>  enkripkan($this->request->getPost('alamat')),
            'kota' =>  enkripkan($this->request->getPost('kota')),
            'bidang_usaha' =>  enkripkan($this->request->getPost('bidangusaha')),
            'telepon' => $this->request->getPost('telepon'),
            'deskripsi_usaha' =>  enkripkan($this->request->getPost('deskripsis')),
        ];
        // dd($data);
        $perusahaan->where('user_id', $userId)->set($data)->update();

        // dd($perusahaan);
        return 200;
    }
}
