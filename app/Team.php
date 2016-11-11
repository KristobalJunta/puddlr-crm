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
        return $this->hasMany('App\Project');
    }

    public function project_templates()
    {
        return $this->hasMany('App\ProjectTemplate');
    }
}
