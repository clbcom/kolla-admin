<?php

namespace App\Livewire\Perfiles;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PerfilMioPage extends Component
{
    /**
     * @var array
     */
    public $publicaciones;

    public function mount()
    {
        $this->publicaciones = Auth::user()->publicaciones;
    }

    public function render()
    {
        return view('livewire.perfiles.perfil-mio-page');
    }
}
