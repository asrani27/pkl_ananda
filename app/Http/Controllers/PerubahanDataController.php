<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerubahanData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PerubahanDataController extends Controller
{
    public function perubahandata()
    {
        $data = PerubahanData::paginate(10);

        return view('admin.perubahandata.index', compact('data'));
    }

    public function index()
    {
        $data = PerubahanData::where('user_id', Auth::user()->id)->paginate(10);
        return view('pegawai.perubahandata.index', compact('data'));
    }
    public function tambah()
    {
        return view('pegawai.perubahandata.create');
    }
    public function simpan(Request $req)
    {
        $param = $req->all();
        $param['user_id'] = Auth::user()->id;
        $param['nip'] = Auth::user()->pegawai->nip;
        $param['nama'] = Auth::user()->pegawai->nama;
        PerubahanData::create($param);
        Session::flash('success', 'berhasil di simpan');
        return redirect('/pegawai/data/perubahandata');
    }
    public function edit($id)
    {
        $data = PerubahanData::find($id);
        return view('pegawai.perubahandata.edit', compact('data'));
    }
    public function update(Request $req, $id)
    {
        $param = $req->all();
        $param['user_id'] = Auth::user()->id;
        $param['nip'] = Auth::user()->pegawai->nip;
        $param['nama'] = Auth::user()->pegawai->nama;
        $data = PerubahanData::find($id)->update($param);
        Session::flash('success', 'berhasil di update');
        return redirect('/pegawai/data/perubahandata');
    }
    public function hapus($id)
    {
        $data = PerubahanData::find($id)->delete();
        return back();
    }
    public function verifikasi($id)
    {
        $data = PerubahanData::find($id)->delete();
        return back();
    }
    public function cari()
    {
        $cari = request()->get('cari');
        $data = PerubahanData::where('nama_perubahandata', 'LIKE', '%' . $cari . '%')->get();
        return view('pegawai.perubahandata.index', compact('data'));
    }

    public function verifikasi_perubahandata($id)
    {
        PerubahanData::find($id)->update(['status' => 1]);
        Session::flash('success', 'berhasil di verifikasi');
        return back();
    }
}
