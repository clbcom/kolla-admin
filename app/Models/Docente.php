<?php

namespace App\Models;

use App\Models\User;
use App\Models\Materia;

class Docente extends User {

    /**
     * Obtiene las materias del docente
     */
    public function materias() : HasMany {
        return $this->hasMany(Materia::class, 'id_usuario');
    }
}