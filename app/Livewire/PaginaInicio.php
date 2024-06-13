<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.inicio')]
class PaginaInicio extends Component
{
    public function render()
    {
        return view('livewire.pagina-inicio');
    }
}
