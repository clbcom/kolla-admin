<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opcion extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'id_pregunta',
        'texto_opcion',
        'es_correcta'
    ];
}
