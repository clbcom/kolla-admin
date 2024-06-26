<?php

namespace App\Models;

use App\Models\Tema;
use App\Models\Desafio;
use App\Models\Docente;
use App\Models\Semestre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materia extends Model
{
    use HasFactory;
    
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'id_usuario',
        'id_semestre',
        'id_desafio',
        'nro_orden',
        'nombre',
        'descripcion'
    ];

    /**
     * Obtiene el usuario
     */
    public function usuario() : BelongsTo {
        return $this->belongsTo(Docente::class, 'id_usuario');
    }

    /**
     * Obtener el semestre
     */
    public function semestre() : BelongsTo {
        return $this->belongsTo(Semestre::class, 'id_semestre');
    }

    /**
     * Obtener el desafio
     */
    public function desafio() : BelongsTo {
        return $this->belongsTo(Desafio::class, 'id_desafio');
    }

    /**
     * Obtiene les temas de la materia
     */
    public function temas() : HasMany {
        return $this->hasMany(Tema::class, 'id_materia');
    }
}
