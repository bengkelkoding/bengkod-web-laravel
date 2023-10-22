<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ContactAssistant extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_kursus', 'id_mahasiswa', 'name', 'phone_number',
    ];
    public function course()
    {
        return $this->belongsTo(Kursus::class, 'id_kursus');
    }

//    public function student()
//    {
//        return $this->belongsTo(User::class, 'id_mahasiswa');
//    }

    public function student(): HasMany
    {
        return $this->hasMany(User::class, 'id_asisten', 'id');
    }
}
