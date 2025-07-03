<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Golongan;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BiodataController extends Controller
{
  public function biodata()
  {
    $data = Auth::user()->pegawai;
    $jabatan = Jabatan::get();
    $pendidikan = Pendidikan::get();
    $bagian = Bagian::get();
     $golongan = Golongan::get();
    
     
     if(Auth::user()->roles == 'pimpinan'){
         return view(view: 'pimpinan.biodata', data: compact('data', 'jabatan', 'pendidikan', 'bagian', 'golongan'  ));
     }
      if(Auth::user()->roles == 'pegawai'){
      return view(view: 'pegawai.biodata', data: compact('data', 'jabatan', 'pendidikan', 'bagian', 'golongan'  ));
     }
      if(Auth::user()->roles == 'kepalaTU'){
      return view(view: 'kepalatu.biodata', data: compact('data', 'jabatan', 'pendidikan', 'bagian', 'golongan'  ));
     }
  }

  public function updateBiodata(Request $req, $id)
  {
    Pegawai::find($id)->update($req->all());
    Session::flash('success', 'berhasil di update');
    return back();
  }
}
