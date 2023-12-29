<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_classroom',
        'title',
        'description',
        'task_file',
        'start_time',
        'deadline',
    ];

    // public function course()
    // {
    //     return $this->belongsTo(Course::class, 'id_course');
    // }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'id_classroom');
    }

    public function task()
    {
        return $this->hasMany(Task::class, 'id_assignment');
    }
}
