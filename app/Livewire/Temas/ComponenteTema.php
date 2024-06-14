<?php

namespace App\Livewire\Temas;

use Livewire\Component;

class ComponenteTema extends Component
{
    /**
     * @var array
     */
    public $temas;

    public function render()
    {
        return view('livewire.temas.componente-tema');
    }
}
