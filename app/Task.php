<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'description',
        'time_expected',
        'time_actual',
        'user_id',
        'status_id',
        'project_id',
        'task_template_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    public function time_intervals()
    {
        return $this->hasMany('App\TimeInterval');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
