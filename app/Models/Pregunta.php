<?php

namespace App\Models;

use App\Models\Opcion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pregunta extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'id_cuestionario',
        'texto_pregunta'
    ];

    /**
     * Obtenie las opciones de respuestas
     */
    public function opciones() : HasMany {
        return $this->hasMany(Opcion::class, 'id_pregunta');
    }
}
