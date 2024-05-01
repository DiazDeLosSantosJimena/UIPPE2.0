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
        //  Creación de la tabla tb_areas
        schema::create('tb_areas', function (Blueprint $table){
            $table->id('id_area');
            $table->string('clave', 30);
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->text('foto')->nullable();
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
        schema::dropIfExists('tb_areas');
    }
};
