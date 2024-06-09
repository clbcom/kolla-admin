<?php

namespace App\Models;

use App\Models\Publicacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categoria extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * Nombre de las columnas
     * 
     * @var array
     */
    protected $fillable = [
        'nombre'
    ];

    /**
     * Obtiene las publicaciones de la categoria
     */
    public function publicaciones() : BelongsToMany {
        return $this->belongsToMany(Publicacion::class, 'categorias_publicaciones', 'id_categoria', 'id_publicacion');
    }
}
