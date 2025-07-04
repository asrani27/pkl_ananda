<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Spt;
use App\Models\User;
use App\Models\Pegawai;
use App\Models\SptPetugas;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;

class SptController extends Controller
{
    public function disposisi($id)
    {
        $kepalatu = User::where('roles', 'kepalaTU')->first();
        Spt::find($id)->update([
            'disposisi_kepalatu' => $kepalatu->id,
        ]);
        Session::flash('success', 'dikirim ke kepala TU');
        return back();
    }
    public function index()
    {
        $data = Spt::paginate(10);
        $pegawai = Pegawai::get();
        return view('admin.spt.index', compact('data', 'pegawai'));
    }
    public function tambah()
    {
        return view('admin.spt.create');
    }

    public function simpanPetugas(Request $req, $id)
    {
        $new = new SptPetugas();
        $new->spt_id = $id;
        $new->pegawai_id = $req->pegawai_id;
        $new->save();

        Session::flash('success', 'berhasil di tambah');
        return back();
    }

    public function deletePetugas($id)
    {
        SptPetugas::find($id)->delete();
        return back();
    }
    public function simpan(Request $req)
    {
        $param = $req->all();
        Spt::create($param);
        Session::flash('success', 'berhasil di simpan');
        return redirect('/admin/data/spt');
    }
    public function edit($id)
    {
        $data = Spt::find($id);
        return view('admin.spt.edit', compact('data'));
    }
    public function cetak($id)
    {
        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_cetakspt.pdf';
        $data = Spt::find($id);
        $pdf = Pdf::loadView('pdf.cetakspt', compact('data'))->setOption([
            'enable_remote' => true,
        ]);
        return $pdf->stream($filename);
    }
    public function update(Request $req, $id)
    {
        $param = $req->all();
        $data = Spt::find($id)->update($param); //coding update
        Session::flash('success', 'Berhasil Diupdate'); //memunculkan notif
        return redirect('/admin/data/spt'); //untuk kembali ke menu
    }
    public function hapus($id)
    {
        $data = Spt::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return back();
    }
    public function cari()
    {
        $cari = request()->get('cari');
        $data = Spt::where('keperluan', 'LIKE', '%' . $cari . '%')->get();
        $pegawai = Pegawai::get();
        return view('admin.spt.index', compact('data', 'pegawai'));
    }
    public function detail($id)
    {
        $data = Spt::find($id);

        return view('admin.spt.detail', compact('data'));
    }
}
