<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $data = SuratKeluar::paginate(10);
        return view('admin.suratkeluar.index',compact('data'));
    }
    public function tambah()
    {
    return view('admin.suratkeluar.create');
    }
    public function simpan(Request $req)
    {
        if ($req->file == null) {
            $filename = null;
        } else {
            $filename = time() . '_' . $req->file->getClientOriginalName();
            $req->file('file')->storeAs('uploads', $filename, 'public');
        }
        $param = $req->all();
        $param['file'] = $filename;
        SuratKeluar::create($param);
        Session::flash('success', 'berhasil di simpan');
        return redirect('/admin/data/suratkeluar');
    }
    public function edit($id)
    {
        $data = SuratKeluar::find($id);
        return view('admin.suratkeluar.edit',compact('data'));
    }
    public function update(Request $req, $id)
    {
        if ($req->file == null) {
            $filename = SuratKeluar::find($id)->file;
        } else {
            $filename = time() . '_' . $req->file->getClientOriginalName();
            $req->file('file')->storeAs('uploads', $filename, 'public');
        }
        $param = $req->all();
        $param['file'] = $filename;
        $data = SuratKeluar::find($id)->update($param); //coding apdate
        Session::flash('success', 'Berhasil Diupdate'); //memunculkan notif
        return redirect('/admin/data/suratkeluar'); //untuk kembali ke menu
    }
    public function hapus($id)
    {
        $data = SuratKeluar::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return back();
    }
    public function cari()
    {
        $cari = request()->get('cari');
        $data = SuratKeluar::where('perihal', 'LIKE', '%' . $cari . '%')->get();
        return view('admin.suratkeluar.index', compact('data'));
    }
    public function detail($id)
    {
        $data = SuratKeluar::find($id);

        return view('admin.suratkeluar.detail', compact('data'));
    }
}
