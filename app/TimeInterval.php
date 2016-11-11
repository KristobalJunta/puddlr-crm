<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeInterval extends Model
{
    protected $fillable = [
        'duration',
        'task_id',
        'user_id',
    ];
}
