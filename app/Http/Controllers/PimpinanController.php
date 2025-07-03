<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
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
    public function update_verifikasi(Request $req, $id)
    {
        $data = SuratMasuk::find($id)->update([
            'verifikasi_surat' => $req->verifikasi_surat,
            'tindak_lanjut' => $req->tindak_lanjut,
        ]);
        Session::flash('success', 'telah verifikasi');
        return redirect('pimpinan/verifikasi/surat-masuk');
    }


    public function index_suratkeluar()
    {
        $data = SuratKeluar::where('disposisi_pimpinan', Auth::user()->id)->paginate(10);
        return view('pimpinan.suratkeluar.index', compact('data'));
    }

    public function lihat_suratkeluar($id)
    {
        $data = SuratKeluar::find($id);
        return view('pimpinan.suratkeluar.edit', compact('data'));
    }
    public function verifikasi_suratkeluar($id)
    {
        $data = SuratKeluar::find($id);
        return view('pimpinan.suratkeluar.verifikasi', compact('data'));
    }
    public function update_verifikasi_suratkeluar(Request $req, $id)
    {
        $data = SuratKeluar::find($id)->update([
            'verifikasi_surat' => $req->verifikasi_surat,
            'tindak_lanjut' => $req->tindak_lanjut,
        ]);
        Session::flash('success', 'telah verifikasi');
        return redirect('pimpinan/verifikasi/surat-keluar');
    }
}
