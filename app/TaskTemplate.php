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
    ];
}
