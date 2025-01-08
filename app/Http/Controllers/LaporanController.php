<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pegawai;
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
}
