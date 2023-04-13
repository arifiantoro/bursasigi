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
        $per = $perusahaan->select('perusahaan.*, lowongan.id as id_low,lowongan.id_perusahaan as id_per, lowongan.posisi as posisi, lowongan.tanggal_ditutup as tanggal_ditutup, lowongan.kota_domisili as kota_domisili')
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
                'id_low' => $per[$i]->id_low,
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
        $per = $perusahaan->select('perusahaan.*, lowongan.id as id_low,lowongan.id_perusahaan as id_per, lowongan.posisi as posisi, lowongan.tanggal_ditutup as tanggal_ditutup, lowongan.kota_domisili as kota_domisili')
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
                'id_low' => $per[$i]->id_low,

            );
        }

        // dd($data);
        return json_encode($data);
    }

    public function detail($id = null)
    {
        // dd($id);
        $db = db_connect();
        $det = $db->table('pencari')->select('pencari.*, users.username, users.firstname, users.lastname, users.email, pendidikan.nama_pendidikan as pendidikan, lowongan.tags as tags')
            ->join('users', 'pencari.user_id = users.id', 'LEFT')
            ->join('pendidikan', 'pencari.pendidikan_id = pendidikan.id', 'LEFT')
            ->join('lowongan', 'pencari.pekerjaan_dicari = lowongan.tags', 'LEFT')
            ->get()->getResult();
        // dd($det);

        $data = array();
        for ($i = 0; $i < count($det); $i++) {
            $data[$i] = (object) array(
                'no' => $i + 1,
                'firstname' => $det[$i]->firstname,
                'pekerjaan_dicari' => $det[$i]->pekerjaan_dicari,
                'pendidikan' =>  $det[$i]->pendidikan,

            );
        }
        // dd($data);
        return view('admin/nav/header') . view('admin/lowongan/detail', [
            'data' => $data, 'id' => $id,
        ]) . view('admin/nav/footer');
    }

    public function detailkandidat($id = null)

    {

        $db = db_connect();
        $lowongan = $db->table('lowongan')
            ->where('id', $id)
            ->select('posisi')
            ->get()->getFirstRow();
        $det = $db->table('pencari')->select('pencari.*, users.username, users.firstname, users.lastname, users.email, pendidikan.nama_pendidikan as pendidikan')
            ->join('users', 'pencari.user_id = users.id', 'LEFT')
            ->join('pendidikan', 'pencari.pendidikan_id = pendidikan.id', 'LEFT')
            ->like('pencari.tags', $lowongan->posisi)
            ->get()->getResult();
        // dd($det);

        $data = array();
        for ($i = 0; $i < count($det); $i++) {
            $data[$i] = (object) array(
                'no' => $i + 1,
                'firstname' => $det[$i]->firstname,
                'pekerjaan_dicari' => $det[$i]->pekerjaan_dicari,
                'pendidikan' =>  $det[$i]->pendidikan,

            );
        }
        // dd($data);
        return json_encode($data);
    }
}
