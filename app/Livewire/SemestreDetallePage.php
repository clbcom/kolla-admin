<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Semestre;

class SemestreDetallePage extends Component
{
    /**
     * @var Semestre
     */
    public $semestre;

    /**
     * Sirve para inicializar datos en el componente
     */
    public function mount($id) {
        
        $this->semestre = Semestre::where('numeral', $id)->first();
    }

    public function render()
    {
        return view('livewire.semestre-detalle-page');
    }
}
