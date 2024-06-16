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

    /**
     * @var Materia
     */
    public $anterior;

    /**
     * @var Materia
     */
    public $siguiente;

    public function mount()
    {
        $this->anterior = Materia::where('id_semestre', $this->materia->id_semestre)
            ->where('nro_orden', $this->materia->nro_orden - 1)
            ->first();

        $this->siguiente = Materia::where('id_semestre', $this->materia->id_semestre)
            ->where('nro_orden', $this->materia->nro_orden + 1)
            ->first();
    }


    public function render()
    {
        return view('livewire.materia-detalle-page');
    }
}
