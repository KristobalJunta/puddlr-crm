<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTemplate extends Model
{
    protected $fillable = [
        'name',
        'description',
        'team_id',
    ];
}
