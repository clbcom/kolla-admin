<?php

namespace App\Livewire\Foro;

use Livewire\Component;

class FormComentarioComponente extends Component
{

    /**
     * @var Publicacion
     */
    public $publicacion;

    public function render()
    {
        return view('livewire.foro.form-comentario-componente');
    }
}
