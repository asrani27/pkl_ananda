<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Models\User;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class KepalatuController extends Controller
{
    public function index()
    {
        $data = SuratMasuk::where('disposisi_kepalatu', Auth::user()->id)->paginate(10);
        return view('kepalatu.suratmasuk.index', compact('data'));
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
        return view('kepalatu.suratmasuk.edit', compact('data'));
    }


    public function lihat_suratkeluar($id)
    {
        $data = SuratKeluar::find($id);
        return view('kepalatu.suratkeluar.edit', compact('data'));
    }

    public function index_suratkeluar()
    {
        $data = SuratKeluar::where('disposisi_kepalatu', Auth::user()->id)->paginate(10);
        return view('kepalatu.suratkeluar.index', compact('data'));
    }
    
    public function disposisi_suratkeluar($id)
    {
        $pimpinan = User::where('roles', 'pimpinan')->first();
        SuratKeluar::find($id)->update([
            'disposisi_pimpinan' => $pimpinan->id,
        ]);
        Session::flash('success', 'dikirim ke pimpinan');
        return back();
    }
}
