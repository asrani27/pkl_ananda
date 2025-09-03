<?php

use App\Models\User;
use App\Models\Bagian;
use App\Models\Pegawai;
use App\Models\Golongan;
use Illuminate\Support\Facades\Auth;

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
if (! function_exists('checkbiodata')) {
    function checkbiodata()
    {
        $data = Auth::user()->pegawai;

        $fieldsToCheck = [
            'nik',
            'nip',
            'nama',
            'email',
            'jkel',
            'ttl',
            'alamat',
            'telpon',
            'agama',
            'bagian_id',
            'jabatan_id',
            'golongan_id',
            'pendidikan_id',
            'prodi',
            'status'
        ];

        $nullCount = collect($fieldsToCheck)
            ->filter(fn($field) => is_null($data->$field))
            ->count();

        return $nullCount;
    }
}
if (! function_exists('checkdokumen')) {
    function checkdokumen()
    {
        $data = Auth::user()->upload;

        $fieldsToCheck = [
            'file_perjanjian_kerja',
            'file_sertifikat',
            'file_ijazah',
            'file_ktp',
            'file_kk',
            'file_foto',
        ];

        $nullCount = collect($fieldsToCheck)
            ->filter(fn($field) => is_null($data->$field))
            ->count();

        return $nullCount;
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
