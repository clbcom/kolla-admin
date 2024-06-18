<?php

namespace App\Livewire\Foro;

use Carbon\Carbon;
use Livewire\Component;

class ComentariosComponente extends Component
{
    /**
     * @var array
     */
    public $comentarios;

    /**
     * Calcula hace cuantos dias u horas existen desde la fecha del comentario hasta ahora
     */
    public function calculaDiferenciaDeTiempo($fecha)
    {
        $fechaComentario = Carbon::parse($fecha);
        $ahora = Carbon::now();

        $diferencia = $fechaComentario->diffInDays($ahora);
        if ($diferencia > 1) {
            return round($diferencia) . " d";
        }

        $diferencia = $fechaComentario->diffInHours($ahora);
        if ($diferencia > 1) {
            return round($diferencia) . " h";
        }

        $diferencia = $fechaComentario->diffInMinutes($ahora);
        if ($diferencia > 1) {
            return round($diferencia) . " m";
        }

        return "menos de un minuto";
    }

    public function render()
    {
        return view('livewire.foro.comentarios-componente');
    }
}
