<?php

namespace App\Livewire\Temas;

use Livewire\Component;

class ImgComponente extends Component
{
    /**
     * @var string
     */
    public $url;

    public function render()
    {
        return view('livewire.temas.img-componente');
    }
}
