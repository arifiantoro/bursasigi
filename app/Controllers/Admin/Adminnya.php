<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Adminnya extends BaseController
{
    public function __construct()
    {
        $session = session();
    }

    public function index()
    {
        return view('admin/nav/header').view('admin/atur/profil').view('admin/nav/footer');
    }

    public function ubah()
    {
        return view('admin/nav/header').view('admin/atur/ubah').view('admin/nav/footer');
    }

    public function ubahPassword()
    {
        $auth = service('authentication');
	
        $credentials = [
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password')
        ];
        
        if ($auth->validate($credentials) ) {
            // dd($this->request->getPost() );
            
            $newPass = $this->request->getPost('newPass');
            $newPass2 = $this->request->getPost('newPass2');

            if($newPass == $newPass2)
            {
                $users = model('UserModel');
                $user = $users->where('id', user()->id )
                            ->first();
                $user->password 		= $newPass;
                $user->reset_at 		= date('Y-m-d H:i:s');
                $users->save($user);

                return redirect()->back()->with('pesan', 'Password Anda Berhasil Diubah');
            }else{
                return redirect()->back()->with('error', 'Password Yang Anda Masukan Tidak Sama');
            }

        }else{
            return redirect()->back()->with('error', 'Password Yang Anda Masukan Salah');
        }
    }
}
