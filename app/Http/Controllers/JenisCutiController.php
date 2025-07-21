<?php

namespace App\Http\Controllers;

use App\Models\JenisCuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JenisCutiController extends Controller
{
    public function index()
    {
        $data = JenisCuti::orderBy('id', 'DESC')->get();
        return view('admin.jeniscuti.index', compact('data'));
    }
    public function tambah()
    {
        return view('admin.jeniscuti.create');
    }
    public function simpan(Request $req)
    {
        if (JenisCuti::where('nama_cuti', $req->nama_cuti)->first() != null) {
            Session::flash('error', 'Nama Cuti Sudah Ada');
            return back();
        }
        JenisCuti::create($req->all());
        Session::flash('success', 'berhasil di simpan');
        return redirect('/admin/data/jeniscuti');
    }
    public function edit($id)
    {
        $data = JenisCuti::find($id);
        return view('admin.jeniscuti.edit', compact('data'));
    }
    public function update(Request $req, $id)
    {
        $data = JenisCuti::find($id)->update($req->all());
        Session::flash('success', 'berhasil di update');
        return redirect('/admin/data/jeniscuti');
    }
    public function hapus($id)
    {
        $data = JenisCuti::find($id)->delete();
        return back();
    }

    public function cari()
    {
        $cari = request()->get('cari');
        $data = JenisCuti::where('nama_cuti', 'LIKE', '%' . $cari . '%')->get();
        return view('admin.jeniscuti.index', compact('data'));
    }
}
