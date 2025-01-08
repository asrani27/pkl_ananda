<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiodataController extends Controller
{
  public function biodata()
{
  return view('pegawai.biodata');
}
}
