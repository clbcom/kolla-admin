<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voto extends Model
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
        'id_publicacion',
        'id_comentario',
        'positivo',
        'negativo',
    ];

    /**
     * Obtiene en donde se hizo el voto si publicacion o comentario
     */
    public function dondeSeRealizoVoto() : MorphTo {
        return $this->morphTo(); // pendiente: entender los arguntos
    }


}
