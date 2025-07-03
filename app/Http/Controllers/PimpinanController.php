<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PimpinanController extends Controller
{
    public function index()
    {
        $data = SuratMasuk::where('disposisi_pimpinan', Auth::user()->id)->paginate(10);
        return view('pimpinan.suratmasuk.index', compact('data'));
    }
    public function disposisi($id)
    {
        $pimpinan = User::where('roles', 'pimpinan')->first();
        SuratMasuk::find($id)->update([
            'disposisi_pimpinan' => $pimpinan->id,
        ]);
        Session::flash('success', 'dikirim ke pimpinan');
        return back();
    }
    public function lihat($id)
    {
        $data = SuratMasuk::find($id);
        return view('pimpinan.suratmasuk.edit', compact('data'));
    }
    public function verifikasi($id)
    {
        $data = SuratMasuk::find($id);
        return view('pimpinan.suratmasuk.verifikasi', compact('data'));
    }
}
