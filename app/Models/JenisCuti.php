<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisCuti extends Model
{
    use HasFactory;
    protected $table = 'jenis_cuti';
     protected $guarded = ['id'];
    public $timestamps = false;
    public function pengajuanCuti()
    {
        return $this->belongsTo(PengajuanCuti::class, 'id'); // Relasi dengan Jenis Cuti
    }
    
}

