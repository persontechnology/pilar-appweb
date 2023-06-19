<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ubicacion extends Model
{
    use HasFactory;

    protected $fillable=[
        'nombre','tipo_id'
    ];

    public function tipo(): BelongsTo
    {
        return $this->belongsTo(Tipo::class);
    }
}
