<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;

class SuratMasukController extends Controller
{
    public function disposisi($id)
    {
        $kepalatu = User::where('roles', 'kepalaTU')->first();
        SuratMasuk::find($id)->update([
            'disposisi_kepalatu' => $kepalatu->id,
        ]);
        Session::flash('success', 'dikirim ke kepala TU');
        return back();
    }
    public function index()
    {
        $data = SuratMasuk::paginate(10);
        return view('admin.suratmasuk.index', compact('data'));
    }
    public function tambah()
    {
        return view('admin.suratmasuk.create');
    }
    public function simpan(Request $req)
    {
        if ($req->file == null) {
            $filename = null;
        } else {
            $filename = time() . '_' . $req->file->getClientOriginalName();
            $req->file('file')->storeAs('uploads', $filename, 'public');
        }
        $param = $req->all();
        $param['file'] = $filename;
        SuratMasuk::create($param);
        Session::flash('success', 'berhasil di simpan');
        return redirect('/admin/data/suratmasuk');
    }
    public function edit($id)
    {
        $data = SuratMasuk::find($id);
        return view('admin.suratmasuk.edit', compact('data'));
    }
    public function update(Request $req, $id)
    {
        if ($req->file == null) {
            $filename = SuratMasuk::find($id)->file;
        } else {
            $filename = time() . '_' . $req->file->getClientOriginalName();
            $req->file('file')->storeAs('uploads', $filename, 'public');
        }
        $param = $req->all();
        $param['file'] = $filename;
        $data = SuratMasuk::find($id)->update($param); //coding update
        Session::flash('success', 'Berhasil Diupdate'); //memunculkan notif
        return redirect('/admin/data/suratmasuk'); //untuk kembali ke menu
    }
    public function hapus($id)
    {
        $data = SuratMasuk::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return back();
    }
    public function cari()
    {
        $cari = request()->get('cari');
        $data = SuratMasuk::where('perihal', 'LIKE', '%' . $cari . '%')->get();
        return view('admin.suratmasuk.index', compact('data'));
    }
    public function detail($id)
    {
        $data = SuratMasuk::find($id);

        return view('admin.suratmasuk.detail', compact('data'));
    }

    public function print_disposisi($id)
    {
        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_disposisi.pdf';
        $data = SuratMasuk::find($id);
        $pdf = Pdf::loadView('pdf.disposisi_surat', compact('data'));
        return $pdf->stream($filename);
    }
}
