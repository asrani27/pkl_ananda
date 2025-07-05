<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Spt;
use App\Models\User;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class KepalatuController extends Controller
{
    public function index()
    {
        $data = SuratMasuk::where('disposisi_kepalatu', Auth::user()->id)->paginate(10);
        return view('kepalatu.suratmasuk.index', compact('data'));
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
        return view('kepalatu.suratmasuk.edit', compact('data'));
    }

    public function lihat_suratkeluar($id)
    {
        $data = SuratKeluar::find($id);
        return view('kepalatu.suratkeluar.edit', compact('data'));
    }

    public function index_suratkeluar()
    {
        $data = SuratKeluar::where('disposisi_kepalatu', Auth::user()->id)->paginate(10);
        return view('kepalatu.suratkeluar.index', compact('data'));
    }

    public function disposisi_suratkeluar($id)
    {
        $pimpinan = User::where('roles', 'pimpinan')->first();
        SuratKeluar::find($id)->update([
            'disposisi_pimpinan' => $pimpinan->id,
        ]);
        Session::flash('success', 'dikirim ke pimpinan');
        return back();
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
    public function lihat_spt($id)
    {
        $data = Spt::find($id);
        return view('kepalatu.spt.edit', compact('data'));
    }

    public function index_spt()
    {
        $data = Spt::where('disposisi_kepalatu', Auth::user()->id)->paginate(10);
        return view('kepalatu.spt.index', compact('data'));
    }

    public function disposisi_spt($id)
    {
        $pimpinan = User::where('roles', 'pimpinan')->first();
        Spt::find($id)->update([
            'disposisi_pimpinan' => $pimpinan->id,
        ]);
        Session::flash('success', 'dikirim ke pimpinan');
        return back();
    }
    public function cetak_spt($id)
    {
        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_cetakspt.pdf';
        $data = Spt::find($id);
        $pdf = Pdf::loadView('pdf.cetakspt', compact('data'))->setOption([
            'enable_remote' => true,
        ]);
        return $pdf->stream($filename);
    }
}
