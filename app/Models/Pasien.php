<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'alamat', 'no_ktp', 'no_hp', 'no_rm'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($pasien) {
            $lastPasien = static::latest('created_at')->first();

            if ($lastPasien) {
                $lastNumber = (int) substr($lastPasien->no_rm, -3);
                $nextNumber = $lastNumber + 1;
            } else {
                $nextNumber = 1;
            }

            // Format nomor Rekam Medis
            $pasien->no_rm = now()->format('Ym') . '-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        });
    }
}
