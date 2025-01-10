<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SptPetugas extends Model
{
    use HasFactory;

    protected $table = "spt_petugas";
    protected $guarded = ['id'];

    public $timestamps = false;
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }
}
