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
      return view('pegawai.upload',compact('data'));
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
    // Validasi file wajib diisi
    $req->validate([
        'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ], [
        'file.required' => 'Dokumen belum dipilih.',
        'file.file' => 'File tidak valid.',
        'file.mimes' => 'Format file harus jpg, jpeg, png, atau pdf.',
        'file.max' => 'Ukuran file maksimal 2MB.',
    ]);

    // Ambil file yang di-upload
    $uploadedFile = $req->file('file');

    // Sanitasi nama file
    $originalName = preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $uploadedFile->getClientOriginalName());
    $filename = time() . '_' . $originalName;

    // Simpan file ke folder 'uploads' dalam storage public
    $uploadedFile->storeAs('uploads', $filename, 'public');

    // Cek apakah user sudah pernah mengupload sebelumnya
    $upload = Upload::where('user_id', Auth::id())->first();

    if ($upload == null) {
        // Jika belum ada, buat baru
        $upload = new Upload();
        $upload->user_id = Auth::id();
    }

    // Simpan / update data
    $upload->file_kk = $filename;
    $upload->save();

    Session::flash('success', 'Berhasil disimpan');
    return back();
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
