<?php

namespace App\Models;

use App\Models\Dokter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class JadwalPeriksa extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     // 'id',
    //     'id_dokter',
    //     'hari',
    //     'jam_mulai',
    //     'jam_selesai',
    //     'is_active'
    // ];

    // public function dokter(){
    //     return $this->belongsTo(Dokter::class,'id_dokter','id');
    // }


    // protected static function boot()
    // {
    //     parent::boot();
    //     static::creating(function ($model) {
    //         $user = Auth::user();

    //         if ($user) {
    //             $model->id_dokter = $user->id_dokter;
    //             self::where('id_dokter', $model->id_dokter)
    //             ->where('is_active', true)
    //             ->update(['is_active' => false]);
    //             $model->is_active = true;
    //         }
    //     });
    //     static::updating(function ($jadwalPeriksa) {
    //         if ($jadwalPeriksa->is_active) {
    //             self::where('id_dokter', $jadwalPeriksa->id_dokter)
    //                 ->where('is_active', true)
    //                 ->update(['is_active' => false]);
    //         }
    //     });
    // }

    protected $fillable = [
        'id_dokter', 'hari', 'jam_mulai', 'jam_selesai','is_active',
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter', 'id');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $user = Auth::user();

            if ($user) {
                $model->id_dokter = $user->id_dokter;
                self::where('id_dokter', $model->id_dokter)
                ->where('is_active', true)
                ->update(['is_active' => false]);
                $model->is_active = true;
            }
        });

        static::updating(function ($jadwalPeriksa) {
            if ($jadwalPeriksa->is_active) {
                self::where('id_dokter', $jadwalPeriksa->id_dokter)
                    ->where('is_active', true)
                    ->update(['is_active' => false]);
            }
        });
    }


}
