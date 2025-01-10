<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pegawai;
use App\Models\Spt;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function laporan()
    {
        return view('admin.laporan.index');
    }
    public function laporan_pegawai()
    {
        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_pegawai.pdf';
        $data = Pegawai::get();
        $pdf = Pdf::loadView('pdf.pegawai', compact('data'))->setOption([
            'enable_remote' => true,
        ])->setPaper('a4', 'landscape');
        return $pdf->stream($filename);
    }
    public function laporan_belumupload()
    {
        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_belumupload.pdf';
        $data = Pegawai::get();
        $pdf = Pdf::loadView('pdf.belumupload', compact('data'))->setOption([
            'enable_remote' => true,
        ])->setPaper('a4', 'landscape');
        return $pdf->stream($filename);
    }
    public function laporan_suratmasuk()
    {
        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_suratmasuk.pdf';
        $data = SuratMasuk::get();
        $pdf = Pdf::loadView('pdf.suratmasuk', compact('data'))->setOption([
            'enable_remote' => true,
        ])->setPaper('a4', 'landscape');
        return $pdf->stream($filename);
    }
    public function laporan_suratkeluar()
    {
        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_suratkeluar.pdf';
        $data = SuratKeluar::get();
        $pdf = Pdf::loadView('pdf.suratkeluar', compact('data'))->setOption([
            'enable_remote' => true,
        ])->setPaper('a4', 'landscape');
        return $pdf->stream($filename);
    }
    public function laporan_spt()
    {
        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_spt.pdf';
        $data = Spt::get();
        $pdf = Pdf::loadView('pdf.spt', compact('data'))->setOption([
            'enable_remote' => true,
        ])->setPaper('a4', 'landscape');
        return $pdf->stream($filename);
    }
}
