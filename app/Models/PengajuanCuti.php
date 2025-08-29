<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanCuti extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_cuti';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class); // Relasi dengan User
    }

    public function jenisCuti()
    {
        return $this->belongsTo(JenisCuti::class, 'jenis_cuti_id', 'id'); // Relasi dengan Jenis Cuti
    }
}
