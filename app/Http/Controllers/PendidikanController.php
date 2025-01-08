<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PendidikanController extends Controller
{
    public function index()
    {
        $data = Pendidikan::paginate(10);
        return view('admin.pendidikan.index', compact('data'));
    }
    public function tambah()
    {
        return view('admin.pendidikan.create');
    }
    public function simpan(Request $req)
    {
                Pendidikan::create($req->all());

                Session::flash('success', 'berhasil di simpan');
                return redirect('/admin/data/pendidikan');
        
    }
    public function edit($id)
    {
        $data = Pendidikan::find($id);
        return view('admin.pendidikan.edit', compact('data'));
    }
    public function update(Request $req, $id)
    {
        $data = Pendidikan::find($id)->update($req->all());
         Session::flash('success', 'berhasil di update');

        return redirect('/admin/data/pendidikan');
    }
    public function hapus($id)
    {
        $data = Pendidikan::find($id)->delete();
        return back();
    }

    public function cari()
    {
        $cari = request()->get('cari');
        $data = Pendidikan::where('nama_pendidikan', 'LIKE', '%' . $cari . '%')->get();
        return view('admin.pendidikan.index', compact('data'));
    }
}
