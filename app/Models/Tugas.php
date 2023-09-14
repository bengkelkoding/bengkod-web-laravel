<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_mahasiswa',
        'id_kursus',
        'file_tugas',
        'nilai_akhir',
    ];
}
