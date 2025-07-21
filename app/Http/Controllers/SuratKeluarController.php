<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;

class SuratKeluarController extends Controller
{
    public function index()
    {

        $data = SuratKeluar::orderBy('id', 'DESC')->get();
        return view('admin.suratkeluar.index', compact('data'));
    }
    public function cetak($id)
    {
        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_cetakspt.pdf';
        $data = SuratKeluar::find($id);
        $pdf = Pdf::loadView('pdf.cetaksuratkeluar', compact('data'))->setOption([
            'enable_remote' => true,
        ]);
        return $pdf->stream($filename);
    }
    public function tambah()
    {
        return view('admin.suratkeluar.create');
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
        SuratKeluar::create($param);
        Session::flash('success', 'berhasil di simpan');
        return redirect('/admin/data/suratkeluar');
    }
    public function edit($id)
    {
        $data = SuratKeluar::find($id);
        return view('admin.suratkeluar.edit', compact('data'));
    }
    public function update(Request $req, $id)
    {
        if ($req->file == null) {
            $filename = SuratKeluar::find($id)->file;
        } else {
            $filename = time() . '_' . $req->file->getClientOriginalName();
            $req->file('file')->storeAs('uploads', $filename, 'public');
        }
        $param = $req->all();
        $param['file'] = $filename;
        $data = SuratKeluar::find($id)->update($param); //coding update
        Session::flash('success', 'Berhasil Diupdate'); //memunculkan notif
        return redirect('/admin/data/suratkeluar'); //untuk kembali ke menu
    }
    public function hapus($id)
    {
        $data = SuratKeluar::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return back();
    }
    public function cari()
    {
        $cari = request()->get('cari');
        $data = SuratKeluar::where('perihal', 'LIKE', '%' . $cari . '%')->get();
        return view('admin.suratkeluar.index', compact('data'));
    }
    public function detail($id)
    {
        $data = SuratKeluar::find($id);

        return view('admin.suratkeluar.detail', compact('data'));
    }

    public function disposisi($id)
    {
        $kepalatu = User::where('roles', 'kepalaTU')->first();
        SuratKeluar::find($id)->update([
            'disposisi_kepalatu' => $kepalatu->id,
        ]);
        Session::flash('success', 'dikirim ke kepala TU');
        return back();
    }
}
