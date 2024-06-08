<?php

namespace App\Models;

use Filament\Panel;
use App\Models\User;
use App\Models\Materia;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Docente extends User implements FilamentUser {

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * Obtiene las materias del docente
     */
    public function materias() : HasMany {
        return $this->hasMany(Materia::class, 'id_usuario');
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->tipo_usuario === 'docente';
    }
}