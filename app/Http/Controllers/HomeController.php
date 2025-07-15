<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function kepalatu()
    {
        return view('kepalatu.home');
    }
    public function pimpinan()
    {
        return view('pimpinan.home');
    }
    public function admin()
    {
        $bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];


        $dataSuratMasuk = DB::table('surat_masuk')
            ->selectRaw('MONTH(tgl_masuk) as bulan, COUNT(*) as total')
            ->groupBy('bulan')
            ->pluck('total', 'bulan');
        $dataSuratKeluar = DB::table('surat_keluar')
            ->selectRaw('MONTH(tgl_surat) as bulan, COUNT(*) as total')
            ->groupBy('bulan')
            ->pluck('total', 'bulan');

        $dataSPT = DB::table('spt')
            ->selectRaw('MONTH(tanggal) as bulan, COUNT(*) as total')
            ->groupBy('bulan')
            ->pluck('total', 'bulan');

        $chartSuratMasuk = [];
        $chartSuratKeluar = [];
        $chartSPT = [];
        for ($i = 1; $i <= 12; $i++) {
            $chartSuratMasuk[] = [
                'label' => $bulan[$i - 1],
                'y' => $dataSuratMasuk[$i] ?? 0
            ];
            $chartSuratKeluar[] = [
                'label' => $bulan[$i - 1],
                'y' => $dataSuratKeluar[$i] ?? 0
            ];
            $chartSPT[] = [
                'label' => $bulan[$i - 1],
                'y' => $dataSPT[$i] ?? 0
            ];
        }


        return view('admin.home', compact('chartSuratMasuk', 'chartSuratKeluar', 'chartSPT'));
    }
    public function pegawai()
    {
        return view('pegawai.home');
    }
}
