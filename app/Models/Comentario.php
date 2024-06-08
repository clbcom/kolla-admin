<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Publicacion;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comentario extends Post {
    
    /**
     * @var array
     */
    protected $fillable = [
        'id_publicacion'
    ];

    public function __construct(array $attributes = []) {
        parent::__construct($attributes);

        $this->fillable = array_merge(parent::$fillable, $this->fillable);
    }

    /**
     * Obtiene la publicacion a la que pertenece
     */
    public function publicacion() : BelongsTo {
        return $this->belongsTo(Publicacion::class, 'id_publicacion');
    }
}