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
        Schema::create('medios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_publicacion')->nullable();
            $table->unsignedBigInteger('id_comentario')->nullable();
            $table->enum('tipo_medio', ['enlace', 'img']);
            $table->string('url', 1000);

            $table->foreign('id_publicacion')->references('id')->on('publicaciones')->onDelete('cascade');
            $table->foreign('id_comentario')->references('id')->on('comentarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medios');
    }
};
