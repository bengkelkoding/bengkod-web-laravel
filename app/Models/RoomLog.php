<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoomLog extends Model
{
    protected $table = "room_logs";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        'nim',
        'session',
        'status',
        'access_status',
        'accessed'
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'nim', 'kode');
    }
}
