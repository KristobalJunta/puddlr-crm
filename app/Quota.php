<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quota extends Model
{
    protected $fillable = [
        'project_id',
        'user_id',
        'time',
    ];
}
