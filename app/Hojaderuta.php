<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hojaderuta extends Model
{
    protected $fillable = [
        'name',
        'text',
        'start'
    ];
}
