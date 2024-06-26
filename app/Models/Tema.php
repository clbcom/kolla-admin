<?php

namespace App\Models;

use App\Models\Recurso;
use App\Models\Cuestionario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tema extends Model
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
        'id_materia',
        'nro_orden',
        'titulo',
        'descripcion'
    ];

    /**
     * Obtiene los cuestionarios
     */
    public function cuestionarios(): HasMany
    {
        return $this->hasMany(Cuestionario::class, 'id_tema');
    }

    public function recurso(): HasOne
    {
        return $this->hasOne(Recurso::class, 'id_tema');
    }

    /**
     * Obtiene el cuestionario de la materia
     */
    public function cuestionario(): HasOne
    {
        return $this->hasOne(Cuestionario::class, "id_tema");
    }

    /**
     * Obtiene los recursos del tema
     */
    public function recursos(): HasMany
    {
        return $this->hasMany(Recurso::class, 'id_tema');
    }
}
