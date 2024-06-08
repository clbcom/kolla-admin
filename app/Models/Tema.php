<?php

namespace App\Models;

use App\Models\Cuestionario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tema extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'id_materia',
        'nro_orden',
        'titulo',
        'descripcion'
    ];

    /**
     * Obtiene los cuestionarios
     */
    public function cuestionarios(): HasMany {
        return $this->hasMany(Cuestionario::class, 'id_tema');
    }
}
