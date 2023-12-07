<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'name',
        'email',
        'password',
        'id_classroom',
        'id_assistant',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'id_course');
    }

    public function task()
    {
        return $this->hasOne(Task::class, 'id_student');
    }

//    public function assistant()
//    {
//        return $this->hasOne(ContactAssistant::class, 'id','id_asisten');
//    }

    public function assistant(): BelongsTo
    {
        return $this->belongsTo(ContactAssistant::class, 'id_assistant', 'id');
    }

    public function taskScore()
    {
        return $this->hasMany(Task::class, 'id_student');
    }

    public function logs()
    {
        return $this->hasMany(Log::class, 'id_student');
    }

    public function classrooms(): HasMany
    {
        return $this->hasMany(Classroom::class, 'id_lecture');
    }
}
