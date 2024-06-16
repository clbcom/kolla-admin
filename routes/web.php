<?php

use App\Livewire\Cuestionarios\CuestionarioPage;
use App\Livewire\PaginaInicio;
use App\Livewire\SemestresPage;
use App\Livewire\MateriaDetallePage;
use App\Livewire\SemestreDetallePage;
use Illuminate\Support\Facades\Route;
use App\Livewire\Temas\TemaDetallePage;

Route::get('/', PaginaInicio::class);
Route::get('/semestres', SemestresPage::class);
Route::get('/semestres/{id}', SemestreDetallePage::class);
Route::get('/materias/{materia}', MateriaDetallePage::class);
Route::get('/materias/{id_materia}/temas/{tema}', TemaDetallePage::class);
Route::get('/cuestionarios/{cuestionario}', CuestionarioPage::class);
