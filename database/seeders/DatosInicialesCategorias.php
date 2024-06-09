<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatosInicialesCategorias extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create(['nombre' => 'Diagramas de flujo']);
        Categoria::create(['nombre' => 'Programacion']);
        Categoria::create(['nombre' => 'Base de datos']);
        Categoria::create(['nombre' => 'SQL']);
        Categoria::create(['nombre' => 'Inteligencia artificial']);
    }
}
