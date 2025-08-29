<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\JenisCuti;
use Illuminate\Http\Request;
use App\Models\PengajuanCuti;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PengajuanCutiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = PengajuanCuti::where('user_id', Auth::user()->id)->get();
        return view('pegawai.pengajuancuti.index', compact('data'));
    }

    public function tambah()
    {
        $jenis = JenisCuti::get();
        $pegawai = Pegawai::get()->map(function ($item) {
            $item->roles = $item->user == null ? null : $item->user->roles;
            return $item;
        });
        $pimpinan = $pegawai->where('roles', 'pimpinan');
        $kasub = $pegawai->where('roles', 'kepalaTU')->merge(
            $pegawai->where('roles', 'kepalaPelayanan')
        );

        return view('pegawai.pengajuancuti.create', compact('jenis', 'pimpinan', 'kasub'));
    }
    public function simpan(Request $req)
    {
        if (JenisCuti::where('nama_cuti', $req->nama_cuti)->first() != null) {
            Session::flash('error', 'Nama Cuti Sudah Ada');
            return back();
        }
        $param = $req->all();
        $param['user_id'] = Auth::user()->id;

        PengajuanCuti::create($param);
        Session::flash('success', 'berhasil di simpan');
        return redirect('/pegawai/data/pengajuancuti');
    }
    public function edit($id)
    {
        $data = PengajuanCuti::find($id);
        $jenis = JenisCuti::get();
        $pegawai = Pegawai::get()->map(function ($item) {
            $item->roles = $item->user == null ? null : $item->user->roles;
            return $item;
        });
        $pimpinan = $pegawai->where('roles', 'pimpinan');
        $kasub = $pegawai->where('roles', 'kepalaTU')->merge(
            $pegawai->where('roles', 'kepalaPelayanan')
        );

        return view('pegawai.pengajuancuti.edit', compact('data', 'jenis', 'pimpinan', 'kasub'));
    }
    public function update(Request $req, $id)
    {

        if (JenisCuti::where('nama_cuti', $req->nama_cuti)->first() != null) {
            Session::flash('error', 'Nama Cuti Sudah Ada');
            return back();
        }
        $param = $req->all();
        $param['user_id'] = Auth::user()->id;

        PengajuanCuti::create($param);
        PengajuanCuti::find($id)->update($param);
        Session::flash('success', 'berhasil di update');
        return redirect('/pegawai/data/pengajuancuti');
    }
    public function hapus($id)
    {
        $data = PengajuanCuti::find($id)->delete();
        return back();
    }

    public function cari()
    {
        $cari = request()->get('cari');
        $data = JenisCuti::where('nama_cuti', 'LIKE', '%' . $cari . '%')->get();
        return view('admin.jeniscuti.index', compact('data'));
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
