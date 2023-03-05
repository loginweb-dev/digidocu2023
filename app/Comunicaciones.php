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

    public function dirigido()
    {
        return $this->belongsTo(User::class, 'dirigido_id');
    }

    public function via()
    {
        return $this->belongsTo(User::class, 'via_id');
    }

    public function hr()
    {
        return $this->belongsTo(Hojaderuta::class, 'hojaderuta_id');
    }
}
