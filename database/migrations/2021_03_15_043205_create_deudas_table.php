<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeudasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deudas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_proveedor')->nullable();
            $table->foreignId('id_credito')->nullable();
            $table->float('valor_deuda', 12, 2);
            $table->decimal('porcentaje_interes_mensual')->nullable();
            $table->decimal('porcentaje_interes_anual')->nullable();
            $table->double('valor_interes', 12, 2)->nullable();
            $table->integer('cant_cuotas')->nullable();
            $table->double('valor_cuota', 12, 2)->nullable();
            $table->integer('cant_cuotas_pagadas')->nullable();
            $table->double('valor_pagado', 12, 2)->nullable();
            $table->double('interes_pagado', 12, 2)->nullable();
            $table->double('capital_pagado', 12, 2)->nullable();
            $table->timestamp('fecha_inicio')->nullable();
            $table->timestamp('fecha_fin')->nullable();
            $table->integer('dia_limite')->nullable();
            $table->foreignId('usu_crea')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deudas');
    }
}
