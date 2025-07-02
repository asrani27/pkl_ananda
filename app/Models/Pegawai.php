<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $guarded = ['id'];
    public $timestamps = false;
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }
    public function getNamaJabatanAttribute()
    {
        return $this->jabatan->nama_jabatan;
    }

    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'golongan_id');
    }
    public function getNamaGolonganAttribute()
    {
        return $this->golongan->nama_golongan;
    }

    public function bagian()
    {
        return $this->belongsTo(Bagian::class, 'bagian_id');
    }
    public function getNamaBagianAttribute()
    {
        return $this->bagian->nama_bagian;
    }
    public function user()
    {
        return $this->hasOne(User::class, 'pegawai_id');
    }
    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class, 'pendidikan_id');
    }
}
