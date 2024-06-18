<?php

namespace App\Livewire\Foro;

use App\Models\Medio;
use Livewire\Component;
use App\Models\Comentario;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FormComentarioComponente extends Component
{
    use WithFileUploads;

    /**
     * @var Publicacion
     */
    public $publicacion;

    /**
     * @var bool
     */
    public $esta_logueado;

    /**
     * Contenido del comentario
     * @var string
     */
    public $contenido;

    /**
     * La imagen que viene con el comentario, 
     * si es que existe
     */
    #[Validate('image:max:10240')]
    public $imagen;

    public function mount()
    {
        $this->esta_logueado = Auth::check();
    }

    /**
     * Elimina la imagen seleccionada
     */
    public function eliminar_imagen()
    {
        unset($this->imagen);
    }

    /**
     * Valida y guacda el comentario
     */
    public function guardar()
    {
        if ($this->esta_logueado) {
            DB::transaction(function () {
                $comentario = Comentario::create([
                    'id_usuario' => Auth::user()->id,
                    'id_publicacion' => $this->publicacion->id,
                    'contenido' => $this->contenido
                ]);

                if (isset($this->imagen)) {
                    $url_img = $this->imagen->store(path: 'medios');
                    Medio::create([
                        'id_comentario' => $comentario->id,
                        'tipo_medio' => 'img',
                        'url' => $url_img
                    ]);
                }
            });
            return redirect("/foro/post/{$this->publicacion->id}");
        }
    }


    public function render()
    {
        return view('livewire.foro.form-comentario-componente');
    }
}
