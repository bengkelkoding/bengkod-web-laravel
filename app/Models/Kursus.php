<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    use HasFactory;

    protected $table = 'kursus';

    protected $fillable = [
        'image', 'judul', 'author', 'hari', 'jam', 'url', 'description',
    ];

    // Definisikan relasi dengan tabel Section
    public function sections()
    {
        return $this->hasMany(Section::class, 'id_kursus');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'id_kursus');
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class, 'id_kursus');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'id_kursus');
    }

    public function logs()
    {
        return $this->hasMany(Log::class, 'id_kursus');
    }
}
