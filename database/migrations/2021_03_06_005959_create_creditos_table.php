<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_cliente');
            $table->integer('id_deudor');
            $table->float('valor_credito');
            $table->integer('nro_cuotas');
            $table->integer('nro_cuotas_pagas');
            $table->decimal('tasa_interes', $precision = 8, $scale = 2);
            $table->timestamps();
        });

        Schema::table('creditos', function (Blueprint $table) {
            $table->date('fecha_inicio');
            $table->boolean('deudor')->comment('Solo se confirma si tiene deudor');
            $table->double('valor_cuota',12,4);
            $table->double('valor_abonado',12,4);
            $table->double('valor_capital',12,4);
            $table->double('valor_interes',12,4);
            $table->double('porcent_interes_anual',12,4);
            $table->double('porcent_interes_mensual',12,4);
            $table->tinyInteger('estado');
            $table->integer('usu_crea');
            $table->integer('id_sede');
            $table->integer('dia_limite');
            $table->renameColumn('nro_cuotas', 'cant_cuotas');
            $table->renameColumn('nro_cuotas_pagas', 'cant_cuotas_pagadas');
            $table->renameColumn('tasa_interes', 'interes_mensual');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('creditos');
    }


    /**
    * Se pueden crear tablas temporales, que 
    * son eliminadas cuando el usuario cierra sesión
    *
    * Schema::create('calculations', function (Blueprint $table) {
    *   $table->temporary();    *
    *   // ...
    *});
    **/
}
