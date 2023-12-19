<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClassInformation extends Model
{
    use HasFactory;

    protected $table = 'class_informations';

    protected $fillable = [
        'id_classroom', 'title', 'description'
    ];

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class, 'id_classroom', 'id');
    }
}
