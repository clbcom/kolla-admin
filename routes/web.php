<?php

use App\Livewire\Auth\Login;
use App\Livewire\PaginaInicio;
use App\Livewire\SemestresPage;
use App\Livewire\Auth\Registrar;
use App\Livewire\MateriaDetallePage;
use App\Livewire\SemestreDetallePage;
use Illuminate\Support\Facades\Route;
use App\Livewire\Temas\TemaDetallePage;
use App\Livewire\Perfiles\PerfilMioPage;
use App\Livewire\Cuestionarios\CuestionarioPage;
use App\Livewire\Foro\CategoriaDetallePage;
use App\Livewire\Foro\ForoPage;
use App\Livewire\Foro\PublicacionDetallePage;
use App\Livewire\Publicaciones\EditarPublicacionPage;
use App\Livewire\Publicaciones\NuevaPublicacionPage;

Route::get('/', PaginaInicio::class);
Route::get('/semestres', SemestresPage::class);
Route::get('/semestres/{id}', SemestreDetallePage::class);
Route::get('/materias/{materia}', MateriaDetallePage::class);
Route::get('/materias/{id_materia}/temas/{tema}', TemaDetallePage::class);
Route::get('/cuestionarios/{cuestionario}', CuestionarioPage::class);

Route::get('/login', Login::class)->name('login');
Route::get('/registrar', Registrar::class);
Route::get('/logout', [Login::class, 'logout'])->middleware('auth');
Route::get('/mio', PerfilMioPage::class)->middleware('auth'); // informacion del perfil logueado
Route::get('/mio/nuevopost', NuevaPublicacionPage::class)->middleware('auth');
Route::get('/mio/post/{publicacion}', EditarPublicacionPage::class)->middleware('auth');

Route::get('/foro', ForoPage::class);
Route::get('/foro/categorias/{categoria}', CategoriaDetallePage::class);
Route::get('/foro/post/{publicacion}', PublicacionDetallePage::class);
