<?php

namespace App\Livewire\Temas;

use Livewire\Component;

class PdfComponente extends Component
{
    /**
     * @var string
     */
    public $url;

    public function render()
    {
        return view('livewire.temas.pdf-componente');
    }
}
