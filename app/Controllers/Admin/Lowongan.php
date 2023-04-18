<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Lowongan extends BaseController
{


    public function index()
    {
        $db = db_connect();
        $lowongan = new \App\Models\OpenModel();
        $lowongan = $db->table('lowongan');
        $per = $lowongan->select('lowongan.*, lowongan.id as id_loker, perusahaan.user_id as id, perusahaan.nama_perusahaan as nama_perusahaan')
            ->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.user_id', 'LEFT')
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
                'id_loker' => $per[$i]->id_loker,
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
        $lowongan = new \App\Models\OpenModel();
        $lowongan = $db->table('lowongan');
        $per = $lowongan->select('lowongan.*, lowongan.id as id_loker, perusahaan.user_id as id_per, perusahaan.nama_perusahaan as nama_perusahaan')
            ->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.user_id', 'LEFT')
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
                'id_loker' => $per[$i]->id_loker,

            );
        }

        // dd($data);
        return json_encode($data);
    }

    public function detail($id = null)
    {
        // dd($id);
        $db = db_connect();
        $lowongan = $db->table('lowongan')
            ->where('id', $id)
            ->select('posisi')
            ->get()->getFirstRow();
        $det = $db->table('pencari')->select('pencari.*, pencari.user_id as id_pencari,users.username, users.firstname, users.lastname, users.email, pendidikan.nama_pendidikan as pendidikan')
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
                'usia' =>  calculate_age($det[$i]->tanggal_lahir),
                'id_pencari' =>  $det[$i]->id_pencari,
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
        $det = $db->table('pencari')->select('pencari.*, pencari.user_id as id_pencari,users.username, users.firstname, users.lastname, users.email, pendidikan.nama_pendidikan as pendidikan')
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
                'usia' =>  calculate_age($det[$i]->tanggal_lahir),
                'id_pencari' =>  $det[$i]->id_pencari,
            );
        }
        // dd($data);
        return json_encode($data);
    }

    public function panggil()
    {
        $db = db_connect();
        $wawancara = $db->table('lowongan')
            ->join('wawancara', 'lowongan.id = wawancara.id_lowongan', 'LEFT')
            ->select('lowongan.*, wawancara.jadwal_wawancara, wawancara.lokasi, wawancara.undangan')
            ->get()->getResult();

        for ($i = 0; $i < count($wawancara); $i++) {
            $final[$i] = (object) array(
                'no' => $i + 1,
                'user_id' => $wawancara[$i]->id,
                'jadwal_test' => $wawancara[$i]->jadwal_wawancara,
                'lokasi' => $wawancara[$i]->lokasi,
                'undangan' => $wawancara[$i]->undangan,
            );
        }

        // return json_encode($final);
        // dd($final);
        return view('admin/nav/header') . view('admin/lowongan/panggil', [
            'data' => $final
        ]) . view('admin/nav/footer');
    }

    public function panggilpos($id = null)

    {

        $db = db_connect();
        $wawancara = $db->table('lowongan')
            ->join('wawancara', 'lowongan.id = wawancara.id_lowongan', 'LEFT')
            ->select('lowongan.*, wawancara.jadwal_wawancara, wawancara.lokasi, wawancara.undangan')
            ->get()->getResult();

        for ($i = 0; $i < count($wawancara); $i++) {
            $final[$i] = (object) array(
                'no' => $i + 1,
                'user_id' => $wawancara[$i]->id,
                'jadwal_test' => $wawancara[$i]->jadwal_wawancara,
                'lokasi' => $wawancara[$i]->lokasi,
                'undangan' => $wawancara[$i]->undangan,
            );
        }
        // dd($data);
        return json_encode($final);
    }


    public function wawancara()
    {
        $db = db_connect();
        $lowongan = new \App\Models\OpenModel();
        $lowongan = $db->table('lowongan');
        $per = $lowongan->select('lowongan.*, lowongan.id as id_loker, perusahaan.user_id as id, perusahaan.nama_perusahaan as nama_perusahaan')
            ->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.user_id', 'LEFT')
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
                'id_loker' => $per[$i]->id_loker,
            );
        }
        // dd($data);
        return view('admin/nav/header') . view('admin/lowongan/wawancara', [
            'data' => $data
        ]) . view('admin/nav/footer');
    }
}
