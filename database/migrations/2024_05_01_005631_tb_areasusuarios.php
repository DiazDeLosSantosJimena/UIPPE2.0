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
        //  Creación de la tabla tb_areasusuarios
        schema::create('tb_areasusuarios', function (Blueprint $table){
            $table->id('id_areasusuarios');
            $table->foreignId('area_id')->references('id_area')->on('tb_areas');
            $table->foreignId('usuario_id')->references('id')->on('users');
            $table->integer('id_registro');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //  Método dropIfExist
        schema::dropIfExists('tb_areasusuarios');
    }
};
