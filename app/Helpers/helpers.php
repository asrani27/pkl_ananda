<?php

use App\Models\Bagian;
use App\Models\Golongan;
use App\Models\Pegawai;

if (! function_exists('golongan')) {
    function golongan()
    {
        return Golongan::get();
    }
}
if (! function_exists('bagian')) {
    function bagian()
    {
        return Bagian::get();
    }
}
if (! function_exists('pegawai')) {
    function pegawai()
    {
        return Pegawai::where('status', 'PNS')->get();
    }
}
