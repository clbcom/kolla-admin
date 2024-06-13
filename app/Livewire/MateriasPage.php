<?php

namespace App\Livewire;

use Livewire\Component;

class MateriasPage extends Component
{
    /**
     * @var array
     */
    public $materias;

    public function render()
    {
        return view('livewire.materias-page');
    }
}
