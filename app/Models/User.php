<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable //Implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // public function canAccessPanel(Panel $panel): bool
    // {
    //     return true;
    // }

    public function isAdmin(): bool{
        return $this->is_admin;
    }

    public function isDokter(): bool{
        return $this->is_dokter;
    }

    public function isPasien(): bool{
        return $this->is_pasien;
    }

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'is_dokter',
        'id_dokter',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function dokter(){
        return $this->belongsTo(Dokter::class, 'id_dokter', 'id');
    }
}
