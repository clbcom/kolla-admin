<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medio extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'id_publicacion',
        'id_comentario',
        'tipo_medio',
        'url'
    ];
}
