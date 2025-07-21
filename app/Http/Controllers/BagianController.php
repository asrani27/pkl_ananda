<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BagianController extends Controller
{
    public function index()
    {
        $data = Bagian::orderBy('id', 'DESC')->get();
        return view('admin.bagian.index', compact('data'));
    }
    public function tambah()
    {
        return view('admin.bagian.create');
    }
    public function simpan(Request $req)
    {
        if (Bagian::where('nama_bagian', $req->nama_bagian)->first() != null) {
            Session::flash('error', 'Nama Bagian Sudah Ada');
            return back();
        }
        Bagian::create($req->all());
        Session::flash('success', 'berhasil di simpan');
        return redirect('/admin/data/bagian');
    }
    public function edit($id)
    {
        $data = Bagian::find($id);
        return view('admin.bagian.edit', compact('data'));
    }
    public function update(Request $req, $id)
    {
        $data = Bagian::find($id)->update($req->all());
        Session::flash('success', 'berhasil di update');
        return redirect('/admin/data/bagian');
    }
    public function hapus($id)
    {
        $data = Bagian::find($id)->delete();
        return back();
    }

    public function cari()
    {
        $cari = request()->get('cari');
        $data = Bagian::where('nama_bagian', 'LIKE', '%' . $cari . '%')->get();
        return view('admin.bagian.index', compact('data'));
    }
}
