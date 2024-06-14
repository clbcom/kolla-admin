<?php

use App\Livewire\MateriaDetallePage;
use App\Livewire\MateriasPage;
use App\Livewire\PaginaInicio;
use App\Livewire\SemestreDetallePage;
use App\Livewire\SemestresPage;
use App\Livewire\Temas\TemaDetallePage;
use Illuminate\Support\Facades\Route;

Route::get('/', PaginaInicio::class);
Route::get('/semestres', SemestresPage::class);
Route::get('/semestres/{id}', SemestreDetallePage::class);
Route::get('/materias/{materia}', MateriaDetallePage::class);
Route::get('/materias/{id_materia}/temas/{tema}', TemaDetallePage::class);
