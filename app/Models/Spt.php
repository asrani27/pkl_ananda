<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spt extends Model
{
    use HasFactory;
    protected $table = 'spt';
    protected $guarded = ['id'];

    public function petugas()
    {
        return $this->hasMany(SptPetugas::class, 'spt_id');
    }
    public function kepalatu()
    {
        return $this->belongsTo(User::class, 'disposisi_kepalatu');
    }
    public function pimpinan()
    {
        return $this->belongsTo(User::class, 'disposisi_pimpinan');
    }
}
