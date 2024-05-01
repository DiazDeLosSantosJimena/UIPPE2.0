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
        schema::create('tb_entregas', function (Blueprint $table){
            $table->id('id_entregas');
            $table->foreignId('areameta_id')->references('id_areasmetas')->on('tb_areasmetas');
            $table->foreignId('meses_id')->references('id_meses')->on('tb_meses');
            $table->integer('id_registro');
            $table->integer('cantidad');
            $table->boolean('activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //  Método dropIfExist
        schema::dropIfExists('tb_entregas');
    }
};
