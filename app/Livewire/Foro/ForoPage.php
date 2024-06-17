<?php

namespace App\Livewire\Foro;

use Livewire\Component;
use App\Models\Categoria;
use App\Models\Publicacion;

class ForoPage extends Component
{
    /**
     * Publicaciones de todos los usuarios
     * 
     * @var array<Publicacion>
     */
    public $publicaciones;

    /**
     * Todas las categorias
     * 
     * @var array<Categoria>
     */
    public $categorias;

    public function mount()
    {
        $this->publicaciones = Publicacion::orderBy('fecha', 'desc')->get();
        $this->categorias = Categoria::all();
    }

    public function render()
    {
        return view('livewire.foro.foro-page');
    }
}
