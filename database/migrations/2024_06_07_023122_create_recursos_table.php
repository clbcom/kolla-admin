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
        Schema::create('recursos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tema');
            $table->string('nombre');
            $table->string('url', 1000)->nullable();
            $table->enum('tipo', ['video', 'pdf', 'img'])->nullable();
            $table->unsignedInteger('duracion')->nullable();
            $table->timestamp('fecha');

            $table->foreign('id_tema')->references('id')->on('temas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recursos');
    }
};
