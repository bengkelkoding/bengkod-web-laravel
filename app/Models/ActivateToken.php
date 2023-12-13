<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivateToken extends Model
{
    use HasFactory;

    protected $table = 'activate_tokens';

    protected $fillable = [
        'activate_tokens',
    ];
}
