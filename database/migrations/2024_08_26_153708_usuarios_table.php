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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('Apellido');
            $table->string('Correo');
            $table->string('Telefono');
            $table->string('Pais');
            $table->string('comiada_Fav');
            $table->string('Artista_Fav');
            $table->string('Lugar_Fav');
            $table->string('Color_Fav');
            $table->string('Contraseña');
            $table->string('Imagen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
