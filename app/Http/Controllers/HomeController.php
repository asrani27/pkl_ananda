<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function kepalatu()
    {
        return view('kepalatu.home');
    }
    public function pimpinan()
    {
        return view('pimpinan.home');
    }
    public function admin()
    {
        return view('admin.home');
    }
    public function pegawai()
    {
        return view('pegawai.home');
    }
}
