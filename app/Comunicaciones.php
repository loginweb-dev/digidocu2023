<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comunicaciones extends Model
{
    protected $fillable = [
        'dirigido_id',
        'via_id',
        'de_id',
        'document_id',
        'hojaderuta_id',
        'code',
        'referencia',
        'nota',
        'fecha',
        'hora'
    ];

}
