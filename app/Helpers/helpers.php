<?php

use App\Models\User;
use App\Models\Bagian;
use App\Models\Pegawai;
use App\Models\Golongan;

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
if (! function_exists('allPegawai')) {
    function allPegawai()
    {
        return Pegawai::get();
    }
}
if (! function_exists('pimpinan')) {
    function pimpinan()
    {
        if (User::where('roles', 'pimpinan')->first()->pegawai == null) {
            return null;
        } else {
            return User::where('roles', 'pimpinan')->first()->pegawai;
        }
    }
}
