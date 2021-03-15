<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuotaCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuota_creditos', function (Blueprint $table) {
            $table->id();
            $table->integer('num_cuota');
            $table->double('valor_cuota',12,4);
            $table->date('fecha_pago');
            $table->integer('dias_mora');        
            $table->double('valor_interes_mora',12,4);
            $table->double('valor_pago_interes',12,4);
            $table->double('valor_pago_capital',12,4);
            $table->foreignId('id_credito')->nullable();
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
        Schema::dropIfExists('cuota_creditos');
    }
}
