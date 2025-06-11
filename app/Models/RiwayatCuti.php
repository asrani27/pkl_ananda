<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatCuti extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class); // Relasi dengan User
    }
    public function pengajuanCuti()
    {
        return $this->belongsTo(PengajuanCuti::class); // Relasi dengan Pengajuan Cuti
    }
    public function jenisCuti()
    {
        return $this->belongsTo(JenisCuti::class); // Relasi dengan Jenis Cuti
    }
}
