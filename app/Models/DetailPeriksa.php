<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeriksa extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_periksa', 'id_obat',
    ];

    // Tambahkan jika diperlukan relasi dengan model Periksa
    public function periksa()
    {
        return $this->belongsTo(Periksa::class, 'id_periksa');
    }

    // Tambahkan jika diperlukan relasi dengan model Obat
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }
}
