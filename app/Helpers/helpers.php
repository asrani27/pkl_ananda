<?php

use App\Models\Golongan;

if (! function_exists('golongan')) {
    function golongan()
    {
        return Golongan::get();
    }
}
