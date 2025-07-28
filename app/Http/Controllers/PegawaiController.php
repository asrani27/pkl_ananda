<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bagian;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Golongan;
use App\Models\Pendidikan;
use App\Models\SptPetugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = Pegawai::get();
        return view('admin.pegawai.index', compact('data'));
    }
    public function tambah()
    {
        $jabatan = Jabatan::get();
        $pendidikan = Pendidikan::get();
        $bagian = Bagian::get();
        $golongan = Golongan::get();
        return view('admin.pegawai.create', compact('jabatan', 'pendidikan', 'bagian', 'golongan')); //mengirim
    }

     public function simpan(Request $req)
    {
        if($req->nik == '-'){
            DB::beginTransaction();

            try {

                $peg = Pegawai::create($req->all());

                $new = new User;
                $new->name = $req->nama;
                $new->username = $req->username;
                $new->roles = 'pegawai';
                $new->password = Hash::make($req->password);
                $new->pegawai_id = $peg->id;
                $new->save();

                DB::commit();

                Session::flash('success', 'berhasil di simpan');
                return redirect('/admin/data/pegawai');
            } catch (\Exception $e) {

                DB::rollback();
                Session::flash('error', 'Gagal sistem');
                return back();
            }
        }else{
            $check = Pegawai::where('nik', $req->nik)->first();
            if ($check != null) {
                Session::flash('warning', 'nik Sudah ada');
                $req->flash();
                return back();
            } else {
                DB::beginTransaction();
    
                try {
    
                    $peg = Pegawai::create($req->all());
    
                    $new = new User;
                    $new->name =$req->nama;
                    $new->username =$req->username;
                    $new->password = Hash::make($req->password);
                    $new->pegawai_id = $peg->id;
                    $new->roles = 'pegawai';
                    $new->save();
    
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
       
    }
    // public function simpan(Request $req)
    // {
    //     if ($req->nik == '-') {
    //         DB::beginTransaction();

    //         try {

    //             $peg = Pegawai::create($req->all());

    //             $new = new User;
    //             $new->name = $req->nama;
    //             $new->username = $req->username;
    //             $new->roles = $req->role;
    //             $new->password = Hash::make($req->password);
    //             $new->pegawai_id = $peg->id;
    //             $new->save();

    //             DB::commit();

    //             Session::flash('success', 'berhasil di simpan');
    //             return redirect('/admin/data/pegawai');
    //         } catch (\Exception $e) {

    //             DB::rollback();
    //             Session::flash('error', 'Gagal sistem');
    //             return back();
    //         }
    //     } else {
    //         $check = Pegawai::where('nik', $req->nik)->first();
    //         if ($check != null) {
    //             Session::flash('warning', 'nik Sudah ada');
    //             $req->flash();
    //             return back();
    //         } else {
    //             DB::beginTransaction();

    //             try {

    //                 $peg = Pegawai::create($req->all());

    //                 $new = new User;
    //                 $new->name = $req->nama;
    //                 $new->username = $req->username;
    //                 $new->password = Hash::make($req->password);
    //                 $new->pegawai_id = $peg->id;
    //                 $new->roles = $req->role;
    //                 $new->save();

    //                 DB::commit();

    //                 Session::flash('success', 'berhasil di simpan');
    //                 return redirect('/admin/data/pegawai');
    //             } catch (\Exception $e) {

    //                 DB::rollback();
    //                 Session::flash('error', 'Gagal sistem');
    //                 return back();
    //             }
    //         }
    //     }
    // }
    public function edit($id)
    {
        $data = Pegawai::find($id);
        $jabatan = Jabatan::get();
        $pendidikan = Pendidikan::get();
        $bagian = Bagian::get();
        $golongan = Golongan::get();
        return view('admin.pegawai.edit', compact('data', 'jabatan', 'pendidikan', 'bagian', 'golongan')); //mengirim
    }
    public function update(Request $req, $id)
    {
        $data = Pegawai::find($id)->update($req->all());

        $user = Pegawai::find($id)->user;
        if ($user != null) {
            $update = $user;
            $update->password = $req->password;
            //$update->save();
        }
        Session::flash('success', 'Berhasil Di Update');
        return redirect('/admin/data/pegawai');
    }
    public function hapus($id)
    {
        SptPetugas::where('pegawai_id', $id)->delete();
        Session::flash('success', 'berhasil di hapus');
        $data = Pegawai::find($id)->delete();
        return back();
    }

    public function cari()
    {
        $cari = request()->get('cari');
        $data = Pegawai::where('nama', 'LIKE', '%' . $cari . '%')->orWhereHas('jabatan', function ($query) use ($cari) {
            $query->where('nama_jabatan', 'LIKE', '%' . $cari . '%');
        })->get();
        return view('admin.pegawai.index', compact('data'));
    }

    public function detail($id)
    {
        $data = Pegawai::find($id);

        return view('admin.pegawai.detail', compact('data'));
    }
}
