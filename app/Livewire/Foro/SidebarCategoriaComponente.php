<?php

namespace App\Livewire\Foro;

use Livewire\Component;
use App\Models\Categoria;

class SidebarCategoriaComponente extends Component
{
    /**
     * @var array
     */
    public $categorias;

    public function mount()
    {
        $this->categorias = Categoria::all();
    }

    public function render()
    {
        return view('livewire.foro.sidebar-categoria-componente');
    }
}
