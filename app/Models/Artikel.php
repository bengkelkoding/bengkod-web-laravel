<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    
    protected $table = 'artikel';

    protected $fillable = [
        'id_section', 'nama', 'isi',
    ];

    // Definisikan relasi dengan tabel Section
    public function section()
    {
        return $this->belongsTo(Section::class, 'id_section');
    }
}
