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
        //  Creación de la tabla
        schema::create('tb_metas', function (Blueprint $table){
            $table->id('id_meta');
            $table->string('clave', 30)->nullable();
            $table->text('nombre');
            $table->text('descripcion')->nullable();
            $table->text('unidadmedida')->nullable();
            $table->foreignId('programa_id')->references('id_programa')->on('tb_programas');
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
        schema::dropIfExists('tb_metas');
    }
};
