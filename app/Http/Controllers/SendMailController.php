<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\SendMail;
use App\Models\Upload;
use Illuminate\Http\Request;

class SendMailController extends Controller
{
    public function index($id)
    {
        $data = Upload::find($id)->user;

        return view('admin.dokumen.sendmail', compact('data'));
    }

    public function kirim(Request $req, $id)
    {
        $details = $req->all();

        \Mail::to($req->email)->send(new SendMail($details));
        Session::flash('success', 'email berhasil di kirim');
        return back();
    }
}
