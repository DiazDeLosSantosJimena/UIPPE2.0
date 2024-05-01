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
        //  Creacion de la tabla tb_tipos
        schema::create('tb_tipos', function (Blueprint $table){
            $table->id();
            $table->string('clave', 30);
            $table->string('nombre', 50);
            $table->text('descripcion')->nullable();
            $table->boolean('activo');
            $table->integer('id_registro');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //  Metodo dropIfExist
        schema::dropIfExists('tb_tipos');
    }
};
