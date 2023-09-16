<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactAssistant extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_kursus', 'name', 'phone_number',
    ];
    public function course()
    {
        return $this->belongsTo(Kursus::class, 'id_kursus');
    }
}