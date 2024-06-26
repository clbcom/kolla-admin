<?php

namespace App\Models;

use App\Models\User;
use App\Models\Voto;
use App\Models\Medio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * Obtiene al usuario del post (publicacion o comentario)
     */
    public function usuario() : BelongsTo {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    /**
     * Obtiene los votos
     */
    public function votos() : HasOne {
        return $this->hasOne(Voto::class, 'id_publicacion');
    }

    // belongsToMany para Publicacion obetenr categorias
    // hacer lo mismo en modelo Categoria
}
