<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = Pegawai::paginate(10);
        return view('admin.pegawai.index', compact('data'));
    }
    public function tambah()
    {
        $jabatan = Jabatan::get();
        $pendidikan = Pendidikan::get();
        return view('admin.pegawai.create',compact('jabatan','pendidikan'));
    }
    public function simpan(Request $req)
    {
        $check = Pegawai::where('nik', $req->nik)->first();
        if ($check != null) {
            Session::flash('warning', 'nik Sudah ada');
            $req->flash();
            return back();
        } else {
            DB::beginTransaction();

            try {

                Pegawai::create($req->all());

                DB::commit();

                Session::flash('success', 'berhasil di simpan');
                return redirect('/admin/data/pegawai');
            } catch (\Exception $e) {

                DB::rollback();
                Session::flash('error', 'Gagal sistem');
                return back();
            }
        }
    }
    public function edit($id)
    {
        $data = Pegawai::find($id);
        return view('admin.pegawai.edit', compact('data'));
    }
    public function update(Request $req, $id)
    {
        $data = Pegawai::find($id)->update($req->all());
    }
    public function hapus($id)
    {
        $data = Pegawai::find($id)->delete();
        return back();
    }
}
