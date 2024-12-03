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
        Schema::table('estudiantes', function (Blueprint $table) {
            $table->string('apellidos', 100)->nullable(false)->after('nombre');
            $table->string('direccion', 200)->nullable(false)->after('apellidos');
            $table->integer('votos')->nullable(false);
            $table->boolean('confirmado')->nullable(false)->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('estudiantes', function (Blueprint $table) {
            $table->dropColumn('apellidos');
            $table->dropColumn('direccion');
            $table->dropColumn('votos');
            $table->dropColumn('confirmado');
        });
    }
};
