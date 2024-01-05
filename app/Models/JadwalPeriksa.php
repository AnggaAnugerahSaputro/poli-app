<?php

namespace App\Models;

use App\Models\Dokter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalPeriksa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_dokter',
        'hari',
        'jam_mulai',
        'jam_selesai'
    ];
    
    public function dokter(){
        return $this->belongsTo(Dokter::class,'id_dokter','id');
    }
}
