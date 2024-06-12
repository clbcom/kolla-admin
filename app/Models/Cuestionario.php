<?php

namespace App\Models;

use App\Models\Tema;
use App\Models\Pregunta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cuestionario extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $fillable = [
        'id_tema',
        'titulo',
        'descripcion'
    ];

    /**
     * Obtiene el tema al que corresponde
     */
    public function tema(): BelongsTo
    {
        return $this->belongsTo(Tema::class, 'id_tema');
    }

    public function preguntas(): HasMany
    {
        return $this->hasMany(Pregunta::class, 'id_cuestionario');
    }
}
