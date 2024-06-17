<?php

namespace App\Livewire\Publicaciones;

use App\Models\Medio;
use Livewire\Component;
use App\Models\Categoria;
use App\Models\Publicacion;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NuevaPublicacionPage extends Component
{
    use WithFileUploads;

    /**
     * @var array
     */
    public $categorias;

    /**
     * Aqui se va agregando las categorias que el alumno selecciona
     * @var array
     */
    public $categoriasSeleccionadas = [];

    /**
     * Aqui se almacena el ultimo id de categoria que se selecciono
     * @var string
     */
    public $seleccionada;

    /**
     * @var string
     */
    public $contenido;

    /**
     * @var 
     */
    #[Validate('image|max:10240')] // maximo de 10 MB
    public $medio;

    public function mount()
    {
        $this->categorias = Categoria::all();
    }

    public function eliminar_categoria($id)
    {
        unset($this->categoriasSeleccionadas[$id]);
    }

    public function eliminar_medio()
    {
        unset($this->medio);
    }

    public function actualizar()
    {
        $this->categoriasSeleccionadas[$this->seleccionada] = Categoria::find($this->seleccionada)->nombre;
    }

    public function guardar()
    {
        DB::transaction(function () {
            // crea la publicacion
            $publicacion = Publicacion::create([
                'id_usuario' => Auth::user()->id,
                'contenido' => $this->contenido,
                'estado' => 'abierto'
            ]);

            // crea las relaciones con los categorias
            foreach ($this->categoriasSeleccionadas as $id_categoria => $nombre) {
                DB::insert('INSERT INTO categorias_publicaciones (id_categoria, id_publicacion) VALUES (?, ?)', [$id_categoria, $publicacion->id]);
            }

            // se encarga de guardar el archivo en caso de que lo haya subido
            if (isset($this->medio)) {
                $url_medio = $this->medio->storePublicly(path: 'medios');
                Medio::create([
                    'id_publicacion' => $publicacion->id,
                    'tipo_medio' => 'img',
                    'url' => $url_medio
                ]);
            }
        });
        return redirect('/mio');
    }

    public function render()
    {
        return view('livewire.publicaciones.nueva-publicacion-page');
    }
}
