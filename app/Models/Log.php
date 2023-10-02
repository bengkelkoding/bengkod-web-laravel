<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_mahasiswa',
        'id_kursus',
        'pesan',
        'status',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'id_mahasiswa');
    }

    public function kursus()
    {
        return $this->belongsTo(Kursus::class, 'id_kursus');
    }
}
