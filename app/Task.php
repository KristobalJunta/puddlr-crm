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
        'role_id',
        'status_id',
    ];
}
