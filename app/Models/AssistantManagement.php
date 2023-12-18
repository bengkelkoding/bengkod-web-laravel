<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssistantManagement extends Model
{
    use HasFactory;

    protected $table = 'assistant_managements';

    protected $fillable = [
        'id_assistant', 'id_class_management',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_assistant', 'id');
    }

    public function classManagement(): BelongsTo
    {
        return $this->belongsTo(ClassManagement::class, 'id_class_management', 'id');
    }
}
