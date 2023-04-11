<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Psikologi extends BaseController
{
    public function __construct()
    {
        $session = session();
    }

    public function index()
    {
        return view('admin/nav/header') . view('admin/jadwal/psikotest') . view('admin/nav/footer');
    }

    public function jadwalGet()
    {
        $db = db_connect();
        $pencari = $db->table('pencari_psikotes')
            ->join('users', 'users.id = pencari_psikotes.user_id', 'LEFT')
            ->select('pencari_psikotes.*, users.firstname, users.lastname')
            ->get()->getResult();

        for ($i = 0; $i < count($pencari); $i++) {
            $final[$i] = (object) array(
                'no' => $i + 1,
                'user_id' => $pencari[$i]->user_id,
                'nama_lengkap' => $pencari[$i]->firstname . ' ' . $pencari[$i]->lastname,
                'jadwal_test' => $pencari[$i]->jadwal_test,
                'kognitif' => $pencari[$i]->kognitif,
                'bukti' => $pencari[$i]->bukti_report,
            );
        }

        return json_encode($final);
    }

    public function tambah()
    {
        return view('admin/nav/header') . view('admin/jadwal/tambah') . view('admin/nav/footer');
    }

    public function cariPeserta()
    {
        $db = db_connect();
        $final = null;

        if ($this->request->getGet('term') == null && empty($this->request->getGet('term'))) {
            $cari = $db->table('pencari')->select('pencari.*, users.firstname, users.lastname')
                ->join('users', 'pencari.user_id = users.id', 'LEFT')
                ->get()->getResult();
        } else {
            $cari = $db->table('pencari')->select('pencari.*, users.firstname, users.lastname')
                ->join('users', 'pencari.user_id = users.id', 'LEFT')
                ->like('users.firstname', $this->request->getGet('term'))
                ->orlike('users.lastname', $this->request->getGet('term'))
                ->get()->getResult();
        }

        for ($i = 0; $i < count($cari); $i++) {
            $data[] = array(
                'id' =>  $cari[$i]->user_id,
                'text' => $cari[$i]->firstname . ' ' . $cari[$i]->lastname
            );
        }

        $final = (object) [
            'results' => $data
        ];

        return json_encode($final);
    }


    public function postJadwal()
    {
        $psikotest = new \App\Models\OpenModel();
        $psikotest->setTables('pencari_psikotes');

        $pencari = $this->request->getPost('iPencari');
        $jadwal = $this->request->getPost('iJadwal');

        $insert = [
            'user_id' => $pencari,
            'jadwal_test' => $jadwal
        ];

        if ($psikotest->insert($insert)) {
            return redirect()->to('admin/jadwaltest')->with('sukses', 'Jadwal Psikotest Telah Ditambahkan');
        }
    }

    public function jadwalPost()
    {
        $psikotest = new \App\Models\OpenModel();
        $psikotest->setTables('pencari_psikotes');
        $userId = $this->request->getPost('userId');
        $kognitif = $this->request->getPost('iKogni');
        $emosi = $this->request->getPost('iEmosi');
        $bukti = $this->request->getFile('lampiran');
        $file = $bukti->getRandomName();
        // dd($file);
        $update = [
            'kognitif' => $kognitif,
            'emotional' => $emosi,
            'bukti_report' => enkripkan($file),
        ];

        // dd($userId);

        if ($psikotest->where('user_id', $userId)->set($update)->update()) {
            $bukti->move(FCPATH . '/uploads/pencari/psikotest', $file);
        }

        return redirect()->back()->with('pesan', 'Nilai Psikotest Berhasil Ditambahkan');
    }

    public function jadwalPut()
    {
        $userId = $this->request->getPost('userId');
        $jadwalBaru = $this->request->getPost('ijadwal');

        $psikotest = new \App\Models\OpenModel();
        $psikotest->setTables('pencari_psikotes');

        $ganti = ['jadwal_test' => $jadwalBaru];

        $psikotest->where('user_id', $userId)->set($ganti)->update();

        return redirect()->back()->with('pesan', 'Jadwal Berhasil diubah');
    }


    public function cetak($kode = null)
    {
        $db = db_connect();
        $cari = $db->table('pencari_psikotes')->where('user_id', $kode)->select('bukti_report')->get()->getFirstRow()->bukti_report;

        $baru = dekripsi($cari);

        // dd($baru);
        return $this->response->download(FCPATH . 'uploads/pencari/psikotest/' . $baru, null);
    }
}
