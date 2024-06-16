<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('components.layouts.inicio')]
class Login extends Component
{

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

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];
    /**
     * Inicio de sesion
     */
    public function login()
    {
        $this->validate();
        $datos = [
            'email' => $this->email,
            'password' => $this->password
        ];
        if (Auth::attempt($datos)) {
            session()->regenerate();
            return redirect('/');
        }

        $this->addError('email', "Datos invalidos");
    }

    /**
     * Cierre de sesion
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
