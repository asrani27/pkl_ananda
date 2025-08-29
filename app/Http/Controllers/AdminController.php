<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Upload;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Models\PengajuanCuti;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function cuti()
    {
        $data = PengajuanCuti::orderBy('id', 'DESC')->get()
            ->map(function ($item) {
                $tglMulai = Carbon::parse($item->tgl_mulai);
                $tglSelesai = Carbon::parse($item->tgl_selesai);
                $item->lama = $tglMulai->diffInDays($tglSelesai) + 1;
                $item->kuota = $item->jenisCuti->kuota;
                $pengurangCuti = PengajuanCuti::where('user_id', $item->user_id)->where('jenis_cuti_id', $item->jenis_cuti_id)->where('id', '<=', $item->id)->get();
                if ($pengurangCuti->count() == 0) {
                    $pengurang = 0;
                } else {
                    $pengurang = $pengurangCuti->map(function ($item2) {
                        $tglMulai = Carbon::parse($item2->tgl_mulai);
                        $tglSelesai = Carbon::parse($item2->tgl_selesai);
                        $item2->lama = $tglMulai->diffInDays($tglSelesai) + 1;
                        return $item2;
                    })->sum('lama');
                }

                $item->sisa_cuti = $item->kuota - $pengurang;
                return $item;
            });


        return view('admin.cuti.index', compact('data'));
    }

    public function dokumen()
    {
        $data = Pegawai::get()->map(function ($value) {
            $value->roles = $value->user == null ? null : $value->user->roles;
            return $value;
        })->where('roles', 'pegawai')->values();

        $data->map(function ($item) {
            $item->upload = $item->user->upload;
            return $item;
        });

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
