<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hojaderuta extends Model
{

    public $table = 'hojaderutas';
    protected $fillable = [
        'name',
        'text',
        'start'
    ];


    public static $rules = [
        'name' => 'required',
        'start' => 'required',
        'text' => 'required'
    ];
}
