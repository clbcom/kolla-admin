<?php

namespace Database\Seeders;

use App\Models\Semestre;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatosInicialesSemestres extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Semestre::create(['numeral' => 0, 'literal' => 'Pre Facultativo']);
        Semestre::create(['numeral' => 1, 'literal' => 'Primero']);
        Semestre::create(['numeral' => 2, 'literal' => 'Segundo']);
        Semestre::create(['numeral' => 3, 'literal' => 'Tercero']);
        Semestre::create(['numeral' => 4, 'literal' => 'Cuarto']);
        Semestre::create(['numeral' => 5, 'literal' => 'Quinto']);
        Semestre::create(['numeral' => 6, 'literal' => 'Sexto']);
        Semestre::create(['numeral' => 7, 'literal' => 'Septimo']);
        Semestre::create(['numeral' => 8, 'literal' => 'Octavo']);
        Semestre::create(['numeral' => 9, 'literal' => 'Noveno']);
        Semestre::create(['numeral' => 10, 'literal' => 'Decimo']);
    }
}
