<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;

class Profile extends BaseController
{
    public function index()
    {
        $db = db_connect();
        $profil = $db->table('pencari')->where('user_id', user()->id)->get()->getFirstRow();
        $pendidikan = $db->table('pendidikan')->get()->getResult();
        return view('pencari/nav/header') . view('pencari/profil/profil', ['profil' => $profil, 'pendidikan' => $pendidikan]) . view('pencari/nav/footer');
    }

    public function riwayat()
    {
        $db = db_connect();
        $id = user()->id;
        $pendidik = $db->table('pendidikan')->get()->getResult();
        $pendidikan = new \App\Models\OpenModel();
        $pendidikan->setTables('pencari_pendidikan');
        $realId = dekripsi($id);
        // dd($id);
        $pen = $pendidikan->where('user_id', $realId)->select('pencari_pendidikan.*, pendidikan.nama_pendidikan as pendidikan')
            ->join('pendidikan', 'pencari_pendidikan.pendidikan_id = pendidikan.id', 'LEFT')
            ->findAll();
        // dd($pen);
        $pendi = array();
        for ($i = 0; $i < count($pen); $i++) {
            $pendi[$i] = (object) array(
                'id' => $pen[$i]->id,
                'pendidikan_id' => $pen[$i]->pendidikan_id,
                'instansi' => dekripsi($pen[$i]->instansi),
                'tahun_lulus' => $pen[$i]->tahun_lulus,
                'ipk' => $pen[$i]->ipk,
                'gelar' => dekripsi($pen[$i]->gelar),
                'pendidikan' => $pen[$i]->pendidikan
            );
        }
        // dd($pendi);
        return view('pencari/nav/header') . view('pencari/profil/riwayat', ['pendidikan' => $pendi, 'pendidik' => $pendidik]) . view('pencari/nav/footer');
    }

    public function riwayatPost()
    {
        // dd($this->request->getPost());
        $pencari = new \App\Models\OpenModel();
        $pencari->setTables('pencari_pendidikan');

        $data =
            [
                'user_id' => dekripsi($this->request->getPost('iId')),
                'pendidikan_id' => $this->request->getPost('iPendidikan'),
                'instansi'     => enkripkan($this->request->getPost('iInstitusi')),
                'tahun_lulus' => enkripkan($this->request->getPost('iTahun')),
                'ipk' => $this->request->getPost('iIpk'),
                'gelar' => enkripkan($this->request->getPost('ijurus')),
            ];

        $pencari->save($data);

        return redirect()->to('member/atur-riwayat');
    }

    public function riwayatDelete()
    {
        $id = user()->id;
        $riwayat = new \App\Models\OpenModel();
        $riwayat->setTables('pencari_pendidikan');

        $userId = $riwayat->select('user_id')->find($id);

        if ($riwayat->delete($id)) {
            return redirect()->to('member/atur-riwayat');
        }
    }

    public function kompetensi()
    {
        $id = user()->id;
        $kompetensi = new \App\Models\OpenModel();
        $kompetensi->setTables('pencari_kompetensi');
        $realId = dekripsi($id);
        // dd($kompetensi);
        $kom = $kompetensi
            ->where('user_id', $id)
            ->findAll();
        // dd($kom);
        $kompe = array();
        for ($i = 0; $i < count($kom); $i++) {
            $kompe[$i] = (object) array(
                'id' => $kom[$i]->id,
                'jenis_kompetensi' => dekripsi($kom[$i]->jenis_kompetensi),
                'judul_kompetensi' => dekripsi($kom[$i]->judul_kompetensi),
                'bukti_kompetensi' => $kom[$i]->bukti_kompetensi,
            );
        }
        // dd($kompe);
        return view('pencari/nav/header') . view('pencari/profil/kompetensi', ['kompe' => $kompe]) . view('pencari/nav/footer');
    }

    public function kompetensiPost()
    {
        // dd($this->request->getPost());
        $pencari = new \App\Models\OpenModel();
        $pencari->setTables('pencari_kompetensi');
        // dd($pencari);
        $data =
            [
                'user_id' => dekripsi($this->request->getPost('iId')),
                'jenis_kompetensi'     => enkripkan($this->request->getPost('inama')),
                'judul_kompetensi' => enkripkan($this->request->getPost('iBukti')),
                'bukti_kompetensi' => $this->request->getPost('iBukti'),
            ];
        $pencari->save($data);

        return redirect()->to('member/atur-kompetensi');
    }

    public function kompetensiDelete($kompetensiId)
    {
        $kompetensi = new \App\Models\OpenModel();
        $kompetensi->setTables('pencari_kompetensi');

        $userId = $kompetensi->select('user_id')->find($kompetensiId);

        if ($kompetensi->delete($kompetensiId)) {
            return redirect()->to('member/atur-kompetensi');
        }
    }


    public function password()
    {
        return view('pencari/nav/header') . view('pencari/ubahpass') . view('pencari/nav/footer');
    }

    public function ubahpassword()
    { {
            $auth = service('authentication');

            $credentials = [
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password')
            ];

            if ($auth->validate($credentials)) {
                // dd($this->request->getPost() );

                $newPass = $this->request->getPost('newPass');
                $newPass2 = $this->request->getPost('newPass2');

                if ($newPass == $newPass2) {
                    $users = model('UserModel');
                    $user = $users->where('id', user()->id)
                        ->first();
                    $user->password         = $newPass;
                    $user->reset_at         = date('Y-m-d H:i:s');
                    $users->save($user);

                    return redirect()->back()->with('pesan', 'Password Anda Berhasil Diubah');
                } else {
                    return redirect()->back()->with('error', 'Password Yang Anda Masukan Tidak Sama');
                }
            } else {
                return redirect()->back()->with('error', 'Password Yang Anda Masukan Salah');
            }
        }
    }
    public function editPeserta()
    {
        $users = new \Myth\Auth\Models\UserModel();
        $pencari = new \App\Models\OpenModel();
        $pencari->setTables('pencari');
        $userId = dekripsi($this->request->getPost('id'));

        $datau =
            [
                'firstname' => $this->request->getPost('firstname'),
                'lastname' => $this->request->getPost('lastname'),

            ];

        $data =
            [
                'NIK' => enkripkan($this->request->getPost('nik')),
                'jenis_kelamin' => $this->request->getPost('jenisK'),
                'tanggal_lahir' => $this->request->getPost('tanggallahir'),
                'kota_tinggal' => enkripkan($this->request->getPost('kota')),
                'alamat_member' => enkripkan($this->request->getPost('alamat')),
                'deskripsi_member' => enkripkan($this->request->getPost('deskripsis')),
                'keahlian_member' => enkripkan($this->request->getPost('keahlians')),
                'pendidikan_id' => $this->request->getPost('pendidikan'),
            ];
        dd($data);
        $users->where('id', $userId)->set($datau)->update();
        $pencari->where('user_id', $userId)->set($data)->update();

        return 200;
    }
}
