<?php

namespace App\Controllers\Perusahaan;

use App\Models\LowonganModel;
use App\Controllers\BaseController;

class Loker extends BaseController
{
    public function index()
    {
        $db = db_connect();
        $lowongan = $db->table('lowongan')
            ->where('id_perusahaan', user()->id)
            ->get()->getResult();
        // dd($lowongan);
        $data = array();
        for ($i = 0; $i < count($lowongan); $i++) {
            $data[$i] = (object) array(
                'no' => $i + 1,
                'posisi' =>  $lowongan[$i]->posisi,
                'kota_domisili' =>  $lowongan[$i]->kota_domisili,

            );
        }
        return view('perusahaan/nav/header') . view('perusahaan/lowongan/status') . view('perusahaan/nav/footer');
    }
    public function status()
    {
        $db = db_connect();
        $lowongan = $db->table('lowongan')
            ->where('id_perusahaan', user()->id)
            ->get()->getResult();
        $data = array();
        for ($i = 0; $i < count($lowongan); $i++) {
            $data[$i] = (object) array(
                'no' => $i + 1,
                'id_perusahaan' => $lowongan[$i]->id_perusahaan,
                'tanggal_ditutup' => $lowongan[$i]->tanggal_ditutup,
                'posisi' =>  $lowongan[$i]->posisi,
                'kota_domisili' =>  $lowongan[$i]->kota_domisili,

            );
        }

        // dd($data);
        return json_encode($data);
    }

    public function add()
    {
        return view('perusahaan/nav/header') . view('perusahaan/lowongan/tambah') . view('perusahaan/nav/footer');
    }

    public function store()
    {
        $model = new LowonganModel();
        $data = [
            'id_perusahaan' => $this->request->getPost('id_perusahaan'),
            'posisi' => $this->request->getPost('posisi'),
            'tanggal_dibuka' => $this->request->getPost('tanggal_dibuka'),
            'tanggal_ditutup' => $this->request->getPost('tanggal_ditutup'),
            'kota_domisili' => $this->request->getPost('kota_domisili'),
            'deskripsi_lowongan' => $this->request->getPost('deskripsis'),
            'tags' => $this->request->getPost('tags'),
        ];
        $model->insert($data);
        dd($data);
        return redirect()->to('/perusahaan/tambahlowongan');
    }

    public function edit($id)
    {
        $model = new LowonganModel();
        $data['lowongan'] = $model->find($id);
        return view('lowongan/edit', $data);
    }

    public function update($id)
    {
        $model = new LowonganModel();
        $data = [
            'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
            'posisi' => $this->request->getPost('posisi'),
            'tanggal_dibuka' => $this->request->getPost('tanggal_dibuka'),
            'tanggal_ditutup' => $this->request->getPost('tanggal_ditutup'),
            'kota_domisili' => $this->request->getPost('kota_domisili'),
            'deskripsi_lowongan' => $this->request->getPost('deskripsi_lowongan'),
        ];
        $model->update($id, $data);
        return redirect()->to('/lowongan');
    }

    public function delete($id)
    {
        $model = new LowonganModel();
        $model->delete($id);
        return redirect()->to('/lowongan');
    }
}
