<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Hash;

#[Layout('components.layouts.inicio')]
class Registrar extends Component
{
    /**
     * @var string
     */
    public $nombres;

    /**
     * @var string
     */
    public $paterno;

    /**
     * @var string
     */
    public $materno;

    /**
     * @var string
     */
    public $tipo_usuario = 'alumno';

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $password;

    /**
     * @var bool
     */
    public $es_visible;

    /**
     * Controla el estado del boton e input del password de visible a no visible
     */
    public function cambiar_visibilidad()
    {
        $this->es_visible = !$this->es_visible;
    }

    public $rules = [
        'nombres' => 'required',
        'paterno' => 'required',
        'materno' => 'required',
        'email' =>  'required|email',
        'password' => 'required',
    ];

    /**
     * Creara nuevo usuario de alumno
     */
    public function registrar()
    {
        $this->validate();

        User::create([
            'nombres' => $this->nombres,
            'ap_paterno' => $this->paterno,
            'ap_materno' => $this->materno,
            'tipo_usuario' => $this->tipo_usuario,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        return redirect('/login');
    }

    public function render()
    {
        return view('livewire.auth.registrar');
    }
}
