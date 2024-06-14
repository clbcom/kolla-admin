<?php

namespace App\Livewire\Temas;

use Livewire\Component;

class VideoComponente extends Component
{
    /**
     * @var string
     */
    public $url;

    public function render()
    {
        return view('livewire.temas.video-componente');
    }
}
