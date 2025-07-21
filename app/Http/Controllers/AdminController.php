<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Upload;
use Illuminate\Http\Request;
use App\Models\PengajuanCuti;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function cuti()
    {
        $data = PengajuanCuti::paginate(10);
        return view('admin.cuti.index', compact('data'));
    }

    public function dokumen()
    {
        $data = Upload::paginate(10);
        return view('admin.dokumen.index', compact('data'));
    }
    public function cetak_cuti($id)
    {
        $data = PengajuanCuti::find($id);
        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_cuti.pdf';
        $pdf = Pdf::loadView('pdf.cetakcuti', compact('data'))->setPaper([0, 0, 595.28, 1000], 'portrait');
        return $pdf->stream($filename);
    }
}
