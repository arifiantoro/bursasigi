<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Lowongan extends BaseController
{
    public function index()
    {
        $db = db_connect();
        $lowongan = $db->table('lowongan')
            ->get()->getResult();
        $perusahaan = new \App\Models\OpenModel();
        $perusahaan->setTables('perusahaan');
        $per = $perusahaan->select('perusahaan.*, lowongan.id_perusahaan as id, lowongan.posisi as posisi, lowongan.tanggal_ditutup as tanggal_ditutup, lowongan.kota_domisili as kota_domisili')
            ->join('lowongan', 'perusahaan.user_id = lowongan.id_perusahaan', 'LEFT')
            ->get()->getResult();

        // dd($per);
        $data = array();
        for ($i = 0; $i < count($per); $i++) {
            $data[$i] = (object) array(
                'no' => $i + 1,
                'nama_perusahaan' => dekripsi($per[$i]->nama_perusahaan),
                'tanggal_ditutup' => $per[$i]->tanggal_ditutup,
                'posisi' =>  $per[$i]->posisi,
                'kota_domisili' =>  $per[$i]->kota_domisili,

            );
        }
        // dd($data);
        return view('admin/nav/header') . view('admin/lowongan/index', [
            'data' => $data
        ]) . view('admin/nav/footer');
    }

    public function status()
    {
        $db = db_connect();
        $lowongan = $db->table('lowongan')
            ->get()->getResult();
        $perusahaan = new \App\Models\OpenModel();
        $perusahaan->setTables('perusahaan');
        $per = $perusahaan->select('perusahaan.*, lowongan.id_perusahaan as id, lowongan.posisi as posisi, lowongan.tanggal_ditutup as tanggal_ditutup, lowongan.kota_domisili as kota_domisili')
            ->join('lowongan', 'perusahaan.user_id = lowongan.id_perusahaan', 'LEFT')
            ->get()->getResult();

        // dd($per);
        $data = array();
        for ($i = 0; $i < count($per); $i++) {
            $data[$i] = (object) array(
                'no' => $i + 1,
                'nama_perusahaan' => dekripsi($per[$i]->nama_perusahaan),
                'tanggal_ditutup' => $per[$i]->tanggal_ditutup,
                'posisi' =>  $per[$i]->posisi,
                'kota_domisili' =>  $per[$i]->kota_domisili,

            );
        }

        // dd($data);
        return json_encode($data);
    }
}
