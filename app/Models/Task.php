<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'task';

    protected $fillable = [
        'id_student',
        'id_course',
        'id_assignment',
        'task_file',
        'final_score',
        'status'
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'id_student');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'id_course');
    }
}
