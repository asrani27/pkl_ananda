<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JabatanController extends Controller
{
    public function index()
    {
        $data = Jabatan::paginate(10);
        return view('admin.jabatan.index', compact('data'));
    }
    public function tambah()
    {
        return view('admin.jabatan.create');
    }
    public function simpan(Request $req)
    {
                Jabatan::create($req->all());

                Session::flash('success', 'berhasil di simpan');
                return redirect('/admin/data/jabatan');
        
    }
    public function edit($id)
    {
        $data = Jabatan::find($id);
        return view('admin.jabatan.edit', compact('data'));
    }
    public function update(Request $req, $id)
    {
        $data = Jabatan::find($id)->update($req->all());
         Session::flash('success', 'berhasil di update');

        return redirect('/admin/data/jabatan');
    }
    public function hapus($id)
    {
        $data = Jabatan::find($id)->delete();
        return back();
    }
}
