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
        //  Creación de la tabla tb_areasmetas
        schema::create('tb_areasmetas', function (Blueprint $table){
            $table->id('id_areasmetas');
            $table->foreignId('area_id')->references('id_area')->on('tb_areas');
            $table->foreignId('meta_id')->references('id_meta')->on('tb_metas');
            $table->foreignId('id_programa')->references('id_programa')->on('tb_programas');
            $table->string('objetivo');
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
        schema::dropIfExists('tb_areasmetas');
    }
};
