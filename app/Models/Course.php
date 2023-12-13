<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $table = 'course';

    protected $fillable = [
        'image', 'title', 'author', 'day', 'hour', 'url', 'url_overview', 'description',
    ];

    // Definisikan relasi dengan tabel Section
    public function sections()
    {
        return $this->hasMany(Section::class, 'id_course');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'id_course');
    }

    public function task()
    {
        return $this->hasMany(Task::class, 'id_course');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'id_course');
    }

    public function logs()
    {
        return $this->hasMany(Log::class, 'id_course');
    }

    public function classrooms(): HasMany
    {
        return $this->hasMany(Classroom::class, 'id_course');
    }
}
