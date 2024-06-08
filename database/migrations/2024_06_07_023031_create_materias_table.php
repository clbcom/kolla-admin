<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_semestre');
            $table->unsignedBigInteger('id_desafio');
            $table->unsignedSmallInteger('nro_orden');
            $table->string('nombre');
            $table->text('descripcion');

            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_semestre')->references('id')->on('semestres');
            $table->foreign('id_desafio')->references('id')->on('desafios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias');
    }
};
