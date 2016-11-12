<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'project_template_id',
    ];

    public function project_template()
    {
        return $this->belongsTo('App\ProjectTemplate');
    }

    public function team()
    {
        return $this->project_template->team;
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
