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
        Schema::create('votos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_publicacion')->nullable();
            $table->unsignedBigInteger('id_comentario')->nullable();
            $table->unsignedBigInteger('positivo')->nullable();
            $table->unsignedBigInteger('negativo')->nullable();
            $table->timestamp('fecha');

            $table->foreign('id_publicacion')->references('id')->on('publicaciones');
            $table->foreign('id_comentario')->references('id')->on('comentarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votos');
    }
};
