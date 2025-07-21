<?php

namespace App\Http\Controllers;

use App\Models\PengajuanCuti;
use Carbon\Carbon;
use App\Models\Spt;
use App\Models\User;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PimpinanController extends Controller
{
    public function index()
    {
        $data = SuratMasuk::where('disposisi_pimpinan', Auth::user()->id)->paginate(10);
        return view('pimpinan.suratmasuk.index', compact('data'));
    }
    public function disposisi($id)
    {
        $pimpinan = User::where('roles', 'pimpinan')->first();
        SuratMasuk::find($id)->update([
            'disposisi_pimpinan' => $pimpinan->id,
        ]);
        Session::flash('success', 'dikirim ke pimpinan');
        return back();
    }
    public function lihat($id)
    {
        $data = SuratMasuk::find($id);
        return view('pimpinan.suratmasuk.edit', compact('data'));
    }
    public function verifikasi($id)
    {
        $data = SuratMasuk::find($id);
        return view('pimpinan.suratmasuk.verifikasi', compact('data'));
    }
    public function update_verifikasi(Request $req, $id)
    {
        $data = SuratMasuk::find($id)->update([
            'verifikasi_surat' => $req->verifikasi_surat,
            'tindak_lanjut' => $req->tindak_lanjut,
            'tgl_verifikasi_pimpinan' => Carbon::now()->format('Y-m-d'),
        ]);
        Session::flash('success', 'telah verifikasi');
        return redirect('pimpinan/verifikasi/surat-masuk');
    }
    public function index_suratkeluar()
    {
        $data = SuratKeluar::where('disposisi_pimpinan', Auth::user()->id)->paginate(10);
        return view('pimpinan.suratkeluar.index', compact('data'));
    }

    public function lihat_suratkeluar($id)
    {
        $data = SuratKeluar::find($id);
        return view('pimpinan.suratkeluar.edit', compact('data'));
    }
    public function verifikasi_suratkeluar($id)
    {
        $data = SuratKeluar::find($id);
        return view('pimpinan.suratkeluar.verifikasi', compact('data'));
    }
    public function setujui_cuti($id)
    {
        $data = PengajuanCuti::find($id)->update(['verifikasi_pimpinan' => 'disetujui']);
        return back();
    }
    public function tolak_cuti($id)
    {
        $data = PengajuanCuti::find($id)->update(['verifikasi_pimpinan' => 'ditolak']);
        return back();
    }
    public function update_verifikasi_suratkeluar(Request $req, $id)
    {
        $data = SuratKeluar::find($id)->update([
            'verifikasi_surat' => $req->verifikasi_surat,
            'tindak_lanjut' => $req->tindak_lanjut,
        ]);
        Session::flash('success', 'telah verifikasi');
        return redirect('pimpinan/verifikasi/surat-keluar');
    }


    public function index_spt()
    {
        $data = Spt::where('disposisi_pimpinan', Auth::user()->id)->paginate(10);
        return view('pimpinan.spt.index', compact('data'));
    }
    public function lihat_cuti()
    {
        $data = PengajuanCuti::paginate(10);
        return view('pimpinan.cuti.index', compact('data'));
    }
    public function lihat_spt($id)
    {
        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_cetakspt.pdf';
        $data = Spt::find($id);
        $pdf = Pdf::loadView('pdf.cetakspt', compact('data'))->setOption([
            'enable_remote' => true,
        ]);
        return $pdf->stream($filename);
    }
    public function verifikasi_spt($id)
    {
        $data = Spt::find($id);
        return view('pimpinan.spt.verifikasi', compact('data'));
    }
    public function update_verifikasi_spt(Request $req, $id)
    {
        $data = Spt::find($id)->update([
            'verifikasi_surat' => $req->verifikasi_surat,
            'tindak_lanjut' => $req->tindak_lanjut,
        ]);
        Session::flash('success', 'telah verifikasi');
        return redirect('pimpinan/verifikasi/spt');
    }
    public function cetak_suratkeluar($id)
    {
        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_cetakspt.pdf';
        $data = SuratKeluar::find($id);
        $pdf = Pdf::loadView('pdf.cetaksuratkeluar', compact('data'))->setOption([
            'enable_remote' => true,
        ]);
        return $pdf->stream($filename);
    }
}
