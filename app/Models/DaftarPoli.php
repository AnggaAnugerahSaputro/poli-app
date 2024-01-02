<?php

namespace App\Models;

use App\Models\Poli;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DaftarPoli extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pasien', 'id_jadwal', 'keluhan', 'no_antrian', 'created_at',
    ];

    protected $dates = ['created_at'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->no_antrian = $model->getResetNoAntrianDaily();
        });
    }

    public function jadwal()
    {
        return $this->belongsTo(JadwalPeriksa::class, 'id_jadwal', 'id');
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id');
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_jadwal.id_dokter.id_poli', 'id');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter', 'id');
    }

    protected function getResetNoAntrianDaily()
    {
        $resetDate = now()->startOfDay();
        $maxNoAntrian = static::whereDate('created_at', $resetDate)->max('no_antrian');
        return $maxNoAntrian ? $maxNoAntrian + 1 : 1;
    }
}
