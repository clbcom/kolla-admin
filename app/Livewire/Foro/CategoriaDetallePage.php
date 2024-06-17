<?php

namespace App\Livewire\Foro;

use Livewire\Component;
use App\Models\Categoria;

class CategoriaDetallePage extends Component
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

    /**
     * Categoria actualmente seleccionado
     * @var Categoria
     */
    public Categoria $categoria;

    public function mount(Categoria $categoria)
    {
        $this->categorias = Categoria::all();
        $this->categoria = $categoria;
        $this->publicaciones = $this->categoria->publicaciones;
    }

    public function render()
    {
        return view('livewire.foro.categoria-detalle-page');
    }
}
