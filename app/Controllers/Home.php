<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome');
    }

    public function tatacara()
    {
        return view('home_static/tatacara');
    }

    public function kerjasama()
    {
        return view('home_static/kerjasama');
    }

    // public function enkripsi()
    // {
    //     $kata = enkripkan('PT Sinarindo Global Sarana');

    //     dd($kata);
    // }

}
