<?php

namespace App\Livewire\Cuestionarios;

use Livewire\Component;
use App\Models\Cuestionario;
use App\Models\Opcion;
use App\Servicios\Calificacion;
use Illuminate\Support\Facades\Log;

class CuestionarioPage extends Component
{

    /**
     * @var Cuestionario
     */
    public Cuestionario $cuestionario;

    /**
     * @var bool
     */
    public $esta_calificado = false;

    /**
     * Se almacenara las respuestas del usuario
     * @var array
     */
    public $respuestas = [];

    /**
     * Se almacena la calificacion de las respuestas ya comparadas
     * @var array
     */
    public $calificados = [];

    /**
     * La calificacion obtenida del calculo
     * @var int
     */
    public $calificacion = 0;

    /**
     * Reinicia el estado del cuestionario
     */
    public function reintentar()
    {
        $this->respuestas = [];
        $this->calificados = [];
        $this->calificacion = null;
        $this->esta_calificado = false;
    }

    /**
     * Realiza la calificacion del cuestionario comparando 
     * las respuestas del alumno con las de la base de datos
     */
    public function calificar()
    {
        foreach ($this->respuestas as $id_pregunta => $id_opcion) {
            $calificacion = new Calificacion($id_pregunta, $id_opcion);
            $this->calificados[$id_pregunta] = [
                $calificacion->getOpcionAlumno()->id => $calificacion->getOpcionAlumno()->es_correcta,
                $calificacion->getOpcionCorrecta()->id => $calificacion->getOpcionCorrecta()->es_correcta,
                'es_correcta' => $calificacion->esCorrecta()
            ];

            if ($calificacion->esCorrecta())
                $this->calificacion++;
        }
        $this->esta_calificado = true;
    }

    public function render()
    {
        return view('livewire.cuestionarios.cuestionario-page');
    }
}
