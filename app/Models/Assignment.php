<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_course',
        'id_classroom',
        'title',
        'description',
        'task_file',
        'start_time',
        'deadline',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'id_course');
    }
}
