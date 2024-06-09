<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Denuncia extends Model
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
        'estado',
        'descripcion',
        'url_img',
    ];

    /**
     * Obtener al usuario denunciado
     */
    public function usuario() : BelongsTo {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
