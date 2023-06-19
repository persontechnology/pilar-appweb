<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Registro extends Model
{
    use HasFactory;

    protected $fillable=[
        'ubicacion_id',
        'troza',
        'carga',
        'promedio',
        'metros',
        'factor',
        'numero',
        'altura_a_1',
        'altura_a_2',
        'altura_a_3',
        'altura_a_4',
        'altura_a_5',
        'altura_a_6',
        'altura_a_7',
        'altura_b_1',
        'altura_b_2',
        'altura_b_3',
        'altura_b_4',
        'altura_b_5',
        'altura_b_6',
        'altura_b_7',
    ];


    public function ubicacion(): BelongsTo
    {
        return $this->belongsTo(Ubicacion::class);
    }

    

}
