<?php

namespace App\Models;

use App\Models\Materia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Semestre extends Model
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
        'numeral',
        'literal'
    ];

    /**
     * Obtiene las materias del semestre
     */
    public function materias() : HasMany {
        return $this->HasMany(Materia::class, 'id_semestre');
    }
}
