<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password','admin',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function photo() {
        return $this->morphOne('App\Models\Photo', 'photoable');
    }

    public function tracks() {
        return $this->belongsToMany('App\Models\Track');
    }

    public function courses() {
        return $this->belongsToMany('App\Models\Course');
    }

    public function quizzes() {
        return $this->belongsToMany('App\Models\Quiz');
    }

}
