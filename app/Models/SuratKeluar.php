<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;
    protected $table = 'surat_keluar';
    protected $guarded = ['id'];
    public $timestamps = false;
    public function kepalatu()
    {
        return $this->belongsTo(User::class, 'disposisi_kepalatu');
    }
    public function pimpinan()
    {
        return $this->belongsTo(User::class, 'disposisi_pimpinan');
    }
}
