<?php

namespace App\Http\Controllers;

use App\Models\PengajuanCuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PengajuanCutiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->user()->isAdmin()) {
            // Admin mengelola pengajuan cuti
            $pengajuanCuti = PengajuanCuti::all();
            return view('pengajuan_cuti.index', compact('pengajuanCuti'));
        } elseif (auth()->user()->isKepalaSubTu()) {
            // Kepala Sub Tu hanya bisa melihat pengajuan cuti
            $pengajuanCuti = PengajuanCuti::all();
            return view('pengajuan_cuti.index', compact('pengajuanCuti'));
        }
    }

    public function create()
    {
        if (auth()->user()->isPegawai()) {
            // Pegawai bisa mengajukan cuti
            $leaveTypes = LeaveType::all();
            return view('pengajuan_cuti.create', compact('leaveTypes'));
        }

        return redirect()->route('home');
    }

    public function store(Request $request)
    {
        $request->validate([
            'leave_type_id' => 'required|exists:leave_types,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string',
        ]);

        PengajuanCuti::create([
            'user_id' => auth()->id(),
            'leave_type_id' => $request->leave_type_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => $request->reason,
            'status' => 'pending',
        ]);

        return redirect()->route('pengajuan_cuti.index')->with('success', 'Pengajuan cuti berhasil dibuat');
    }

    public function approve($id)
    {
        $pengajuanCuti = PengajuanCuti::findOrFail($id);

        if (auth()->user()->isPimpinan()) {
            $pengajuanCuti->status = 'approved';
            $pengajuanCuti->approved_by = auth()->id();
            $pengajuanCuti->approved_at = now();
            $pengajuanCuti->save();

            return redirect()->route('pengajuan_cuti.index')->with('success', 'Cuti disetujui');
        }

        return redirect()->route('home');
    }

    public function reject($id)
    {
        $pengajuanCuti = PengajuanCuti::findOrFail($id);

        if (auth()->user()->isPimpinan()) {
            $pengajuanCuti->status = 'rejected';
            $pengajuanCuti->approved_by = auth()->id();
            $pengajuanCuti->approved_at = now();
            $pengajuanCuti->save();

            return redirect()->route('pengajuan_cuti.index')->with('error', 'Cuti ditolak');
        }

        return redirect()->route('home');
    }
}

