<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    use HasFactory;

    protected $table = 'kursus';

    protected $fillable = [
        'image', 'judul', 'author', 'hari', 'jam', 'url',
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
}
