<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Categoria;
use App\Models\Comentario;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Publicacion extends Post {

    /**
     * @var array
     */
    protected $fillable = [
        'estado'
    ];

    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
        $this->fillable = array_merge(parent::$fillable, $this->fillable);
    }

    /**
     * Obtiene las categorias de la publicacion
     */
    public function categorias() : BelongsToMany {
        return $this->belongsToMany(Categoria::class, 'categorias_publicaciones', 'id_publicacion', 'id_categoria');
    }

    /**
     * Obtiene los comentarios
     */
    public function comentarios() : HasMany {
        return $this->hasMany(Comentario::class, 'id_publicacion');
    }
}