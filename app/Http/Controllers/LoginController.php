<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->roles == 'admin') {
                return redirect('admin');
            } elseif (Auth::user()->roles == 'pegawai') {
                return redirect('pegawai');
            } elseif (Auth::user()->roles == 'kepalatu') {
                return redirect('kepalatu');
            } elseif (Auth::user()->roles == 'kepalapelayanan') {
                return redirect('kepalapelayanan');
            } elseif (Auth::user()->roles == 'pimpinan') {
                return redirect('pimpinan');
            }
        }

        return view('login');
    }
    public function login(Request $req)
    {
        $remember = $req->remember ? true : false;
        $credential = $req->only('username', 'password');

        if (Auth::attempt($credential, true)) {
            Auth::user()->update(['login_at' => Carbon::now()]);
            if (Auth::user()->roles == 'admin') {
                Session::flash('success', 'Selamat Datang');
                return redirect('admin');
            }
            if (Auth::user()->roles == 'pegawai') {
                Session::flash('success', 'Selamat Datang');
                return redirect('pegawai');
            }
            if (Auth::user()->roles == 'pimpinan') {
                Session::flash('success', 'Selamat Datang');
                return redirect('pimpinan');
            }
            if (Auth::user()->roles == 'kepalatu') {
                Session::flash('success', 'Selamat Datang');
                return redirect('kepalatu');
            }
            if (Auth::user()->roles == 'kepalapelayanan') {
                Session::flash('success', 'Selamat Datang');
                return redirect('kepalapelayanan');
            }
        } else {
            Session::flash('error', 'username/password salah');
            $req->flash();
            return back();
        }
    }  //
}
