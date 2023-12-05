<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Classroom extends Model
{
    use HasFactory;

    protected $table = 'classrooms';

    protected $fillable = [
        'id_course', 'id_lecture', 'name', 'description', 'day', 'time', 'quota',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'id_course', 'id');
    }

    public function lecture(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_lecture', 'id');
    }


}
