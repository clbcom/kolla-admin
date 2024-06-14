<?php

namespace App\Livewire;

use App\Models\Materia;
use Livewire\Component;

class MateriaDetallePage extends Component
{
    /**
     * @var Materia
     */
    public Materia $materia;

 
    public function render()
    {
        return view('livewire.materia-detalle-page');
    }
}
