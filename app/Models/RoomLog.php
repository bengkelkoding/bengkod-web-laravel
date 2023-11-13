<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomLog extends Model
{
    protected $table = "room_logs";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'nim',
        'session',
        'status',
        'access_status',
        'accessed'
    ];
}
