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
        //  Creación de la tabla tb_correo
        schema::create('tb_correo', function (Blueprint $table){
            $table->id('id_correo');
            $table->text('destinatario');
            $table->text('asunto');
            $table->text('contenido');
            $table->text('remitente')->nullable();
            $table->dateTime('fecha_envio')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //  Método dropIfExist
        schema::dropIfExists('tb_correo');
    }
};
