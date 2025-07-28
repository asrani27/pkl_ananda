<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UploadController extends Controller
{
    public function upload()
    {
      $data = Auth::user();
      if ($data->role == 'pegawai') {
            return view('pegawai.upload', compact('data'));
        } elseif ($data->role == 'kepalatu') {
            return view('kepalatu.upload', compact('data'));
        } elseif ($data->role == 'pimpinan') {
            return view('pimpinan.upload', compact('data'));
        }
    }

    public function uploadktp(Request $req)
    {
      $check = Upload::where('user_id', Auth::user()->id)->first();

      if($check == null){

          $filename = time() . '_' . $req->file->getClientOriginalName(); 
          $req->file('file')->storeAs('uploads', $filename, 'public'); 

          $new = new Upload;
          $new->user_id = Auth::user()->id;
          $new->file_ktp = $filename;
          $new->save();
        
          Session::flash('success', 'berhasil di simpan');
          return back();
      }else{

          $filename = time() . '_' . $req->file->getClientOriginalName(); 
          $req->file('file')->storeAs('uploads', $filename, 'public'); 

          $data = $check;
          $data->user_id = Auth::user()->id;
          $data->file_ktp = $filename;
          $data->save();

          Session::flash('success', 'berhasil di simpan');
          return back();
      }
    }

    public function uploadkk(Request $req)
    {
      $check = Upload::where('user_id', Auth::user()->id)->first();

      if($check == null){

          $filename = time() . '_' . $req->file->getClientOriginalName(); 
          $req->file('file')->storeAs('uploads', $filename, 'public'); 

          $new = new Upload;
          $new->user_id = Auth::user()->id;
          $new->file_kk = $filename;
          $new->save();
        
          Session::flash('success', 'berhasil di simpan');
          return back();
      }else{

          $filename = time() . '_' . $req->file->getClientOriginalName(); 
          $req->file('file')->storeAs('uploads', $filename, 'public'); 

          $data = $check;
          $data->user_id = Auth::user()->id;
          $data->file_kk = $filename;
          $data->save();

          Session::flash('success', 'berhasil di simpan');
          return back();
      }
    }

    public function uploadijazah(Request $req)
    {
      $check = Upload::where('user_id', Auth::user()->id)->first();

      if($check == null){

          $filename = time() . '_' . $req->file->getClientOriginalName(); 
          $req->file('file')->storeAs('uploads', $filename, 'public'); 

          $new = new Upload;
          $new->user_id = Auth::user()->id;
          $new->file_ijazah = $filename;
          $new->save();
        
          Session::flash('success', 'berhasil di simpan');
          return back();
      }else{

          $filename = time() . '_' . $req->file->getClientOriginalName(); 
          $req->file('file')->storeAs('uploads', $filename, 'public'); 

          $data = $check;
          $data->user_id = Auth::user()->id;
          $data->file_ijazah = $filename;
          $data->save();

          Session::flash('success', 'berhasil di simpan');
          return back();
      }
    }

    public function uploadsertifikat(Request $req)
    {
      $check = Upload::where('user_id', Auth::user()->id)->first();

      if($check == null){

          $filename = time() . '_' . $req->file->getClientOriginalName(); 
          $req->file('file')->storeAs('uploads', $filename, 'public'); 

          $new = new Upload;
          $new->user_id = Auth::user()->id;
          $new->file_sertifikat = $filename;
          $new->save();
        
          Session::flash('success', 'berhasil di simpan');
          return back();
      }else{

          $filename = time() . '_' . $req->file->getClientOriginalName(); 
          $req->file('file')->storeAs('uploads', $filename, 'public'); 

          $data = $check;
          $data->user_id = Auth::user()->id;
          $data->file_sertifikat = $filename;
          $data->save();

          Session::flash('success', 'berhasil di simpan');
          return back();
      }
    }

    public function uploadspk(Request $req)
    {
      $check = Upload::where('user_id', Auth::user()->id)->first();

      if($check == null){

          $filename = time() . '_' . $req->file->getClientOriginalName(); 
          $req->file('file')->storeAs('uploads', $filename, 'public'); 

          $new = new Upload;
          $new->user_id = Auth::user()->id;
          $new->file_perjanjian_kerja = $filename;
          $new->save();
        
          Session::flash('success', 'berhasil di simpan');
          return back();
      }else{

          $filename = time() . '_' . $req->file->getClientOriginalName(); 
          $req->file('file')->storeAs('uploads', $filename, 'public'); 

          $data = $check;
          $data->user_id = Auth::user()->id;
          $data->file_perjanjian_kerja= $filename;
          $data->save();

          Session::flash('success', 'berhasil di simpan');
          return back();
      }
    }

    public function uploadfoto(Request $req)
    {
      $check = Upload::where('user_id', Auth::user()->id)->first();

      if($check == null){

          $filename = time() . '_' . $req->file->getClientOriginalName(); 
          $req->file('file')->storeAs('uploads', $filename, 'public'); 

          $new = new Upload;
          $new->user_id = Auth::user()->id;
          $new->file_foto = $filename;
          $new->save();
        
          Session::flash('success', 'berhasil di simpan');
          return back();
      }else{

          $filename = time() . '_' . $req->file->getClientOriginalName(); 
          $req->file('file')->storeAs('uploads', $filename, 'public'); 

          $data = $check;
          $data->user_id = Auth::user()->id;
          $data->file_foto= $filename;
          $data->save();

          Session::flash('success', 'berhasil di simpan');
          return back();
      }
    }
}
