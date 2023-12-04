<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ContactAssistant extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_course', 'id_student', 'name', 'phone_number',
    ];
    public function course()
    {
        return $this->belongsTo(Course::class, 'id_course');
    }

//    public function student()
//    {
//        return $this->belongsTo(User::class, 'id_student');
//    }

    public function student(): HasMany
    {
        return $this->hasMany(User::class, 'id_assistant', 'id');
    }
}
