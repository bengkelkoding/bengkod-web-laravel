<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function classManagements(): HasMany
    {
        return $this->hasMany(ClassManagement::class, 'id_classroom');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'id_classroom');
    }

    public function classInformation()
    {
        return $this->hasMany(ClassInformation::class, 'id_classroom');
    }
}
