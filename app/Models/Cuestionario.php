<?php

namespace App\Models;

use App\Models\Pregunta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function preguntas (): HasMany {
        return $this->hasMany(Pregunta::class, 'id_cuestionario');
    }
}
