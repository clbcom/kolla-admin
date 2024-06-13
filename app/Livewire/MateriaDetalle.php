<?php

namespace App\Livewire;

use Livewire\Component;

class MateriaDetalle extends Component
{
    /**
     * @var Materia
     */
    public $materia;
    public function render()
    {
        return view('livewire.materia-detalle');
    }
}
