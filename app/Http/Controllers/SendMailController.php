<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\SendMail;
use App\Models\Upload;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SendMailController extends Controller
{
    public function index($id)
    {
        $data = Pegawai::find($id);
        
        return view('admin.dokumen.sendmail', compact('data'));
    }

    public function kirim(Request $req, $id)
    {
        $details = $req->all();
        if($req->email == null){    
        Session::flash('error', 'harap isi email');
        return redirect('admin/data/dokumen');
        }else{

        \Mail::to($req->email)->send(new SendMail($details));
        Session::flash('success', 'email berhasil di kirim');
        return redirect('admin/data/dokumen');
        }
    }
}
