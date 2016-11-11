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
}
