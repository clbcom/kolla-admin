<?php

namespace App\Livewire\Temas;

use App\Models\Tema;
use Livewire\Component;

class TemaDetallePage extends Component
{
    /**
     * @var Tema
     */
    public Tema $tema;

    /**
     * @var Tema
     */
    public $anterior;

    /**
     * @var Tema
     */
    public $siguiente;

    public function mount()
    {

        $this->anterior = Tema::where('id_materia', $this->tema->id_materia)
            ->where('nro_orden', $this->tema->nro_orden - 1)
            ->first();


        $this->siguiente = Tema::where('id_materia', $this->tema->id_materia)
            ->where('nro_orden', $this->tema->nro_orden + 1)
            ->first();
    }

    public function render()
    {
        return view('livewire.temas.tema-detalle-page');
    }
}
