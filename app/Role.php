<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function task_templates()
    {
        return $this->hasMany('App\TaksTemplate');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
