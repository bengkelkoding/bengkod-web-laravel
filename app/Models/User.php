<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kode',
        'name',
        'email',
        'password',
        'id_kursus'
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
    ];

    public function course()
    {
        return $this->belongsTo(Kursus::class, 'id_kursus');
    }

    public function tugas()
    {
        return $this->hasOne(Tugas::class, 'id_mahasiswa');
    }

    public function assistant()
    {
        return $this->hasOne(ContactAssistant::class, 'id','id_asisten');
    }

    public function nilaiTugas()
    {
        return $this->hasMany(Tugas::class, 'id_mahasiswa');
    }

    public function logs()
    {
        return $this->hasMany(Log::class, 'id_mahasiswa');
    }
}
