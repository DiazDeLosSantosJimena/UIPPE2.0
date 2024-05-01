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
        //  Creación de la tabla tb_meses
        Schema::create('tb_meses', function (Blueprint $table)
        {
           $table -> id('id_meses');
           $table -> integer('m_enero'); 
           $table -> integer('m_febrero'); 
           $table -> integer('m_marzo'); 
           $table -> integer('m_abril'); 
           $table -> integer('m_mayo'); 
           $table -> integer('m_junio'); 
           $table -> integer('m_julio'); 
           $table -> integer('m_agosto'); 
           $table -> integer('m_septiembre'); 
           $table -> integer('m_octubre'); 
           $table -> integer('m_noviembre'); 
           $table -> integer('m_diciembre');
           $table -> integer('m_cantidad');
           $table -> year('m_year');
           $table -> date('m_fecha');
           $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //  Método dropIfExist
        schema::dropIfExists('tb_meses');
    }
};
