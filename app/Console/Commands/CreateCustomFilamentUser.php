<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateCustomFilamentUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-custom-filament-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $nombre = $this->ask('Nombre');
        $paterno = $this->ask('Apellido Paterno');
        $materno = $this->ask('Apellido Materno');
        $tipo = 'docente';
        $email = $this->ask('Email');
        $password = $this->secret('Password');

        $user = User::create([
            'nombres' => $nombre,
            'ap_paterno' => $paterno,
            'ap_materno' => $materno,
            'tipo_usuario' => $tipo,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info("Usuario {$nombre} creado exitosamente");
    }
}
