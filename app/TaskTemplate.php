<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskTemplate extends Model
{
    protected $fillable = [
        'name',
        'description',
        'time_expected',
        'role_id',
        'project_template_id'
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function project_template()
    {
        return $this->belongsTo('App\ProjectTemplate');
    }
}
