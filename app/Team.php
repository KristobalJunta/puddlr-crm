<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    public function projects()
    {
        return $this->hasManyThrough('App\Project', 'App\ProjectTemplate');
    }

    public function project_templates()
    {
        return $this->hasMany('App\ProjectTemplate');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
