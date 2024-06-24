<?php

namespace App\Livewire\Publicaciones;

use App\Models\Medio;
use Livewire\Component;
use App\Models\Categoria;
use App\Models\Publicacion;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class EditarPublicacionPage extends Component
{
    use WithFileUploads;

    /**
     * @var Publicacion
     */
    public $publicacion;

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
     * @var bool
     */
    public $esta_resuelto;

    /**
     * @var 
     */
    #[Validate('image|max:10240')] // maximo de 10 MB
    public $medio;

    public function mount(Publicacion $publicacion)
    {
        $this->categorias = Categoria::all();
        $this->publicacion = $publicacion;
        $this->contenido = $this->publicacion->contenido;
        $this->esta_resuelto = $this->publicacion->estado === 'cerrado';

        foreach ($this->publicacion->categorias as $categoria) {
            $this->categoriasSeleccionadas[$categoria->id] = $categoria->nombre;
        }
        if (count($this->publicacion->medios) > 0) {
            $this->medio = $this->publicacion->medios[0]->url;
            // $this->medio = TemporaryUploadedFile::createFromLivewire($this->publicacion->medios[0]->url);
        }
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
            $this->publicacion->contenido = $this->contenido;
            $this->publicacion->estado = $this->esta_resuelto ? 'cerrado' : 'abierto';
            $this->publicacion->save();

            // Elimino las anteriores categorias para agregar las nuevas
            DB::delete("DELETE FROM categorias_publicaciones WHERE id_publicacion = ?", [$this->publicacion->id]);

            // crea las relaciones con los categorias
            foreach ($this->categoriasSeleccionadas as $id_categoria => $nombre) {
                DB::insert('INSERT INTO categorias_publicaciones (id_categoria, id_publicacion) VALUES (?, ?)', [$id_categoria, $this->publicacion->id]);
            }

            if (isset($this->medio)) {
                if (isset($this->publicacion->medios[0])) {
                    $medio = $this->publicacion->medios[0];
                    if ($medio->url !== $this->medio) {
                        Storage::disk('public')->delete($medio->url);
                        $medio->url = $this->medio->storePublicly(path: 'medios');
                        $medio->save();
                    }
                } else {
                    $url_medio = $this->medio->storePublicly(path: 'medios');
                    Medio::create([
                        'id_publicacion' => $this->publicacion->id,
                        'tipo_medio' => 'img',
                        'url' => $url_medio
                    ]);
                }
            } else if (isset($this->publicacion->medios[0])) {
                $medio = $this->publicacion->medios[0];
                Storage::disk('public')->delete($medio->url);
                $this->publicacion->medios[0]->delete();
            }
        });

        return redirect('/mio');
    }

    public function render()
    {
        return view('livewire.publicaciones.editar-publicacion-page');
    }
}
