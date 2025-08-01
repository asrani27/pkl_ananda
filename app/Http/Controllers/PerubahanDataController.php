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
         if(Auth::user()->roles == 'pimpinan'){
        return view('pimpinan.perubahandata.index',compact('data'));
      }elseif(Auth::user()->roles == 'kepalaTU'){
        return view('kepalatu.perubahandata.index',compact('data'));
      }else{
        return view('pegawai.perubahandata.index',compact('data'));
      }
    }
    public function tambah()
    { if(Auth::user()->roles == 'pimpinan'){
        return view('pimpinan.perubahandata.create');
      }elseif(Auth::user()->roles == 'kepalaTU'){
        return view('kepalatu.perubahandata.create');
      }else{
        return view('pegawai.perubahandata.create');
      }
    }
    public function simpan(Request $req)
    {
        $param = $req->all();
        $param['user_id'] = Auth::user()->id;
        $param['nip'] = Auth::user()->pegawai->nip;
        $param['nama'] = Auth::user()->pegawai->nama;
        PerubahanData::create($param);
        Session::flash('success', 'berhasil di simpan');
        if(Auth::user()->roles == 'pimpinan'){ 
            return redirect('/pimpinan/data/perubahandata');
      }elseif(Auth::user()->roles == 'kepalaTU'){
            return redirect('/kepalatu/data/perubahandata');
      }else{
            return redirect('/pegawai/data/perubahandata');
      }
       
    }
    public function edit($id)
    {
        $data = PerubahanData::find($id);
         if(Auth::user()->roles == 'pimpinan'){ 
        return view('pimpinan.perubahandata.edit', compact('data'));
      }elseif(Auth::user()->roles == 'kepalaTU'){
        return view('kepalatu.perubahandata.edit', compact('data'));
      }else{
        return view('pegawai.perubahandata.edit', compact('data'));
      }
    }
    public function update(Request $req, $id)
    { 
        if ($req->file == null) {
            $filename = null;
        } else {
            $filename = time() . '_' . $req->file->getClientOriginalName();
            $req->file('file')->storeAs('uploads', $filename, 'public');
        }
        $param = $req->all();
        $param['file'] =  $filename; 
        $param['user_id'] = Auth::user()->id;
        $param['nip'] = Auth::user()->pegawai->nip;
        $param['nama'] = Auth::user()->pegawai->nama;
        $data = PerubahanData::find($id)->update($param);
        Session::flash('success', 'berhasil di update');
        if(Auth::user()->roles == 'pimpinan'){ 
            return redirect('/pimpinan/data/perubahandata');
      }elseif(Auth::user()->roles == 'kepalaTU'){
            return redirect('/kepalatu/data/perubahandata');
      }else{
            return redirect('/pegawai/data/perubahandata');
      }
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
