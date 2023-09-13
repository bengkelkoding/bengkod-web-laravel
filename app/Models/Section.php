<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $table = 'section';

    protected $fillable = [
        'id_kursus', 'nama_section',
    ];

    // Definisikan relasi dengan tabel Kursus
    public function kursus()
    {
        return $this->belongsTo(Kursus::class, 'id_kursus');
    }

    // Definisikan relasi dengan tabel Artikel
    public function artikels()
    {
        return $this->hasMany(Artikel::class, 'id_section');
    }
}
