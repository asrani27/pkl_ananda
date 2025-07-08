<?php

namespace App\Http\Controllers;

use App\Models\PengajuanCuti;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function cuti()
    {
        $data = PengajuanCuti::paginate(10);
        return view('admin.cuti.index', compact('data'));
    }
}
