<?php

namespace App\Livewire\Foro;

use App\Models\User;
use App\Models\Docente;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class SidebarUsuarioComponente extends Component
{
    /**
     * @var User
     */
    public $user;

    public function mount(User $user)
    {
        if ($user->tipo_usuario === 'docente'){
            $this->user = Docente::find($user->id);
        }
        else {
            $this->user = $user;
        }

    }

    public function render()
    {
        return view('livewire.foro.sidebar-usuario-componente');
    }
}
