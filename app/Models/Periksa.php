<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periksa extends Model
{
    use HasFactory;

    protected $fillable = [
        "id_daftar_poli",
        "tgl_periksa",
        "catatan",
        "biaya_periksa"
    ];
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }
}
