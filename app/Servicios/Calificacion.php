<?php

namespace App\Servicios;

use App\Models\Opcion;

class Calificacion
{
    /**
     * Respuesta del alumno
     * 
     * @var Opcion
     */
    private $opcionAlumno;

    /**
     * Respuesta verdadera
     * 
     * @var Opcion
     */
    private $opcionCorrecta;

    /**
     * Si la opcion del alumno fue la correcta
     * 
     * @var bool
     */
    private $esOpcionCorrecta;

    /**
     * Create a new class instance.
     */
    public function __construct($idPregunta, $idRespuestaAlumno)
    {
        $this->opcionAlumno = Opcion::where('id_pregunta', $idPregunta)
            ->where('id', $idRespuestaAlumno)
            ->first();
        $this->opcionCorrecta = Opcion::where('id_pregunta', $idPregunta)
            ->where('es_correcta', true)
            ->first();

        $this->esOpcionCorrecta = $this->opcionAlumno->es_correcta === $this->opcionCorrecta->es_correcta;
    }

    public function getOpcionAlumno(): Opcion
    {
        return $this->opcionAlumno;
    }

    public function getOpcionCorrecta(): Opcion
    {
        return $this->opcionCorrecta;
    }

    public function esCorrecta(): bool
    {
        return $this->esOpcionCorrecta;
    }
}
