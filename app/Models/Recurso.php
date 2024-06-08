<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'id_tema',
        'nombre',
        'url',
        'duracion',
        'tipo',
    ];

}
