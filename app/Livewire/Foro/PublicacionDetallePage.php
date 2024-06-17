<?php

namespace App\Livewire\Foro;

use App\Models\Publicacion;
use Livewire\Component;

class PublicacionDetallePage extends Component
{
    /**
     * @var Publicacion
     */
    public Publicacion $publicacion;

    public function render()
    {
        return view('livewire.foro.publicacion-detalle-page');
    }
}
