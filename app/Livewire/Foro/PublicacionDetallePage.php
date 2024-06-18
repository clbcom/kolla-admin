<?php

namespace App\Livewire\Foro;

use Livewire\Component;
use App\Models\Publicacion;

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
