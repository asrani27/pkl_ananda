<?php

use App\Models\Bagian;
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
