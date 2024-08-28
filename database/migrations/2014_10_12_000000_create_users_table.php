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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo')->unique();
            $table->timestamp('correo_verificado')->nullable();
            $table->string('telefono');
            $table->string('pais');
            $table->string('comida_Fav');
            $table->string('artista_Fav');
            $table->string('lugar_Fav');
            $table->string('color_Fav');
            $table->string('contrasena');
            $table->string('imagen');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
