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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre', 32)->nullable(false);
            $table->string('apellidos', 32)->nullable(true);
            $table->string('direccion')->nullable(true);
            $table->enum ('ciclo',['Administración', 'Comercio', 'Informática', 'Relaciones con las empresas', 'DIOP', 'Innovación'])->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
