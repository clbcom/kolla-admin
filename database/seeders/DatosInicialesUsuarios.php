<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Docente;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatosInicialesUsuarios extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Docentes
        Docente::create([
            'nombres' => 'Cristhian',
            'ap_paterno' => 'Lima',
            'ap_materno' => 'Blanco',
            'tipo_usuario' => 'docente',
            'email' => 'clb@clb.com',
            'password' => Hash::make('clb'),
        ]);
        Docente::create([
            'nombres' => 'Denisse Maritza',
            'ap_paterno' => 'Choque',
            'ap_materno' => 'Mendoza',
            'tipo_usuario' => 'docente',
            'email' => 'dmcm@gmail.com',
            'password' => Hash::make('dmcm'),
        ]);
        Docente::create([
            'nombres' => 'Dayana Faviola',
            'ap_paterno' => 'Colque',
            'ap_materno' => 'Mamani',
            'tipo_usuario' => 'docente',
            'email' => 'dfcm@gmail.com',
            'password' => Hash::make('dfcm'),
        ]);

        // Alumnos
        User::create([
            'nombres' => 'Carlos',
            'ap_paterno' => 'Perez',
            'ap_materno' => 'Garcia',
            'tipo_usuario' => 'alumno',
            'email' => 'carlos.perez@gmail.com',
            'password' => Hash::make('1234'),
        ]);

        User::create([
            'nombres' => 'Maria',
            'ap_paterno' => 'Lopez',
            'ap_materno' => 'Fernandez',
            'tipo_usuario' => 'alumno',
            'email' => 'maria.lopez@gmail.com',
            'password' => Hash::make('12345'),
        ]);

        User::create([
            'nombres' => 'Jorge',
            'ap_paterno' => 'Gonzales',
            'ap_materno' => 'Martinez',
            'tipo_usuario' => 'alumno',
            'email' => 'jorge.gonzales@gmail.com',
            'password' => Hash::make('123456'),
        ]);

        User::create([
            'nombres' => 'Ana',
            'ap_paterno' => 'Rojas',
            'ap_materno' => 'Suarez',
            'tipo_usuario' => 'alumno',
            'email' => 'ana.rojas@gmail.com',
            'password' => Hash::make('1234567'),
        ]);

        User::create([
            'nombres' => 'Luis',
            'ap_paterno' => 'Vargas',
            'ap_materno' => 'Torres',
            'tipo_usuario' => 'alumno',
            'email' => 'luis.vargas@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
