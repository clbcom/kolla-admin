<?php

use App\Livewire\MateriasPage;
use App\Livewire\PaginaInicio;
use App\Livewire\SemestreDetallePage;
use App\Livewire\SemestresPage;
use Illuminate\Support\Facades\Route;

Route::get('/', PaginaInicio::class);
Route::get('/semestres', SemestresPage::class);
Route::get('/semestres/{id}', SemestreDetallePage::class);
