<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerubahanData extends Model
{
    use HasFactory;
    protected $table = 'perubahan_data';
    protected $guarded = ['id'];
}
