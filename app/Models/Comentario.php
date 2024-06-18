<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Publicacion;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comentario extends Post
{
    /**
     * @var array
     */
    protected $fillable = [
        'id_usuario',
        'contenido',
        'id_publicacion'
    ];

    /**
     * Obtiene el usuario que realizo el comentario
     */
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    /**
     * Obtener los medios
     */
    public function medios() : HasMany {
        return $this->hasMany(Medio::class, 'id_comentario');
    }
    
    /**
     * Obtiene la publicacion a la que pertenece
     */
    public function publicacion(): BelongsTo
    {
        return $this->belongsTo(Publicacion::class, 'id_publicacion');
    }
}
