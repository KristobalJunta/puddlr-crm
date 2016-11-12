<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'avatar',
        'priority',
        'role_id',
        'team_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    public function time_intervals()
    {
        return $this->hasMany('App\TimeInterval');
    }

    public function quotas()
    {
        return $this->hasMany('App\Quota');
    }

    public function team()
    {
        return $this->belongsTo('App\Team');
    }
}
