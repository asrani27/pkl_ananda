<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Spt;
use App\Models\User;
use App\Models\Pegawai;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function laporan()
    {
        return view('admin.laporan.index');
    }
    public function laporan_periode()
    {
        $jenis = request()->get('jenis');
        $mulai = request()->get('mulai');
        $sampai = request()->get('sampai');
        if ($jenis == '7') {
            $bulan = null;
            $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_suratmasuk.pdf';
            $data = SuratMasuk::whereBetween('tgl_masuk', [$mulai, $sampai])->get();
            $pdf = Pdf::loadView('pdf.suratmasuk', compact('data', 'mulai', 'sampai', 'bulan'))->setOption([
                'enable_remote' => true,
            ])->setPaper([0, 0, 800, 1100], 'landscape');
            return $pdf->stream($filename);
        }
        if ($jenis == '8') {
            $bulan = null;
            $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_suratkeluar.pdf';
            $data = SuratKeluar::whereBetween('tgl_surat', [$mulai, $sampai])->get();
            $pdf = Pdf::loadView('pdf.suratkeluar', compact('data', 'mulai', 'sampai', 'bulan'))->setOption([
                'enable_remote' => true,
            ])->setPaper([0, 0, 800, 1100], 'landscape');
            return $pdf->stream($filename);
        }
        if ($jenis == '9') {
            $bulan = null;
            $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_spt.pdf';
            $data = Spt::whereBetween('tanggal', [$mulai, $sampai])->get();
            $pdf = Pdf::loadView('pdf.spt', compact('data', 'mulai', 'sampai', 'bulan'))->setOption([
                'enable_remote' => true,
            ])->setPaper([0, 0, 800, 1100], 'landscape');
            return $pdf->stream($filename);
        }
    }
    public function laporan_bulan()
    {
        $jenis = request()->get('jenis');
        $bulan = request()->get('bulan');
        $tahun = request()->get('tahun');
        if ($jenis == '7') {
            $mulai = null;
            $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_suratmasuk.pdf';
            $data = SuratMasuk::whereMonth('tgl_masuk', $bulan)->whereYear('tgl_masuk', $tahun)->get();
            $pdf = Pdf::loadView('pdf.suratmasuk', compact('data', 'bulan', 'tahun', 'mulai'))->setOption([
                'enable_remote' => true,
            ])->setPaper([0, 0, 800, 1100], 'landscape');
            return $pdf->stream($filename);
        }
        if ($jenis == '8') {
            $mulai = null;
            $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_suratkeluar.pdf';
            $data = SuratKeluar::whereMonth('tgl_surat', $bulan)->whereYear('tgl_surat', $tahun)->get();
            $pdf = Pdf::loadView('pdf.suratkeluar', compact('data', 'bulan', 'tahun', 'mulai'))->setOption([
                'enable_remote' => true,
            ])->setPaper([0, 0, 800, 1100], 'landscape');
            return $pdf->stream($filename);
        }
        if ($jenis == '9') {
            $mulai = null;
            $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_spt.pdf';
            $data = Spt::whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun)->get();
            $pdf = Pdf::loadView('pdf.spt', compact('data', 'bulan', 'tahun', 'mulai'))->setOption([
                'enable_remote' => true,
            ])->setPaper([0, 0, 800, 1100], 'landscape');
            return $pdf->stream($filename);
        }
    }
    public function laporan_jenis()
    {
        $jenis = request()->get('jenis');
        if ($jenis == '1') {
            $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_pegawai.pdf';
            $data = Pegawai::get();
            $pdf = Pdf::loadView('pdf.pegawai', compact('data'))->setOption([
                'enable_remote' => true,
            ])->setPaper([0, 0, 800, 1100], 'landscape');
            return $pdf->stream($filename);
        }
        if ($jenis == '2') {
            $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_pegawai.pdf';
            $data = Pegawai::where('status', 'PNS')->get();
            $pdf = Pdf::loadView('pdf.pegawaipns', compact('data'))->setOption([
                'enable_remote' => true,
            ])->setPaper([0, 0, 800, 1100], 'landscape');
            return $pdf->stream($filename);
        }
        if ($jenis == '3') {
            $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_pegawai.pdf';
            $data = Pegawai::where('status', 'TEKON')->get();
            $pdf = Pdf::loadView('pdf.pegawaitekon', compact('data'))->setOption([
                'enable_remote' => true,
            ])->setPaper([0, 0, 800, 1100], 'landscape');
            return $pdf->stream($filename);
        }
        if ($jenis == '4') {
            $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_belumupload.pdf';
            $data = Pegawai::get();
            $pdf = Pdf::loadView('pdf.belumupload', compact('data'))->setOption([
                'enable_remote' => true,
            ])->setPaper([0, 0, 800, 1100], 'landscape');
            return $pdf->stream($filename);
        }
        if ($jenis == '5') {
            $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_pegawai.pdf';
            $data = User::get();
            $pdf = Pdf::loadView('pdf.user', compact('data'))->setOption([
                'enable_remote' => true,
            ])->setPaper([0, 0, 800, 1100], 'landscape');
            return $pdf->stream($filename);
        }
        if ($jenis == '6') {
            $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_pegawai.pdf';
            $sm = SuratMasuk::get()->map(function ($item) {
                $item->jenis = 'surat masuk';
                $item->tanggal = $item->tgl_masuk;
                $item->tgl_disposisi = $item->updated_at;
                return $item->only('no_surat', 'tanggal', 'jenis', 'tgl_disposisi', 'perihal', 'verifikasi_surat', 'tindak_lanjut');
            });
            $sk = SuratKeluar::get()->map(function ($item) {
                $item->jenis = 'surat keluar';
                $item->tanggal = $item->tgl_surat;
                $item->tgl_disposisi = $item->updated_at;
                return $item->only('no_surat', 'tanggal', 'jenis', 'tgl_disposisi', 'perihal', 'verifikasi_surat', 'tindak_lanjut');
            });

            $data = $sm->merge($sk);

            $pdf = Pdf::loadView('pdf.riwayat_surat', compact('data'))->setOption([
                'enable_remote' => true,
            ])->setPaper([0, 0, 800, 1100], 'landscape');
            return $pdf->stream($filename);
        }
        if ($jenis == '7') {
            $mulai = null;
            $bulan = null;
            $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_suratmasuk.pdf';
            $data = SuratMasuk::get();
            $pdf = Pdf::loadView('pdf.suratmasuk', compact('data', 'mulai', 'bulan'))->setOption([
                'enable_remote' => true,
            ])->setPaper([0, 0, 800, 1100], 'landscape');
            return $pdf->stream($filename);
        }
        if ($jenis == '8') {
            $mulai = null;
            $bulan = null;
            $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_suratkeluar.pdf';
            $data = SuratKeluar::get();
            $pdf = Pdf::loadView('pdf.suratkeluar', compact('data', 'mulai', 'bulan'))->setOption([
                'enable_remote' => true,
            ])->setPaper([0, 0, 800, 1100], 'landscape');
            return $pdf->stream($filename);
        }
        if ($jenis == '9') {
            $mulai = null;
            $bulan = null;
            $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_spt.pdf';
            $data = Spt::get();
            $pdf = Pdf::loadView('pdf.spt', compact('data', 'mulai', 'bulan'))->setOption([
                'enable_remote' => true,
            ])->setPaper([0, 0, 800, 1100], 'landscape');
            return $pdf->stream($filename);
        }
        if ($jenis == '10') {
            $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_pegawai.pdf';
            $sm = SuratMasuk::count();
            $sk = SuratKeluar::count();
            $spt = Spt::count();
            $data['sm'] = $sm;
            $data['sk'] = $sk;
            $data['spt'] = $spt;

            $pdf = Pdf::loadView('pdf.rekapitulasi_surat', compact('data'))->setOption([
                'enable_remote' => true,
            ])->setPaper([0, 0, 800, 1100], 'landscape');
            return $pdf->stream($filename);
        }
    }
}
