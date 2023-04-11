<?php

namespace App\Controllers\Perusahaan;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('perusahaan/nav/header') . view('perusahaan/dashboard') . view('perusahaan/nav/footer');
    }

    public function password()
    {
        return view('perusahaan/nav/header') . view('perusahaan/ubahpass') . view('perusahaan/nav/footer');
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
}
