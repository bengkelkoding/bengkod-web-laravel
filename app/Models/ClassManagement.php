<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClassManagement extends Model
{
    use HasFactory;

    protected $table = 'class_managements';

    protected $fillable = [
        'id_student', 'id_classroom',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_student', 'id');
    }

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class, 'id_classroom', 'id');
    }
}
