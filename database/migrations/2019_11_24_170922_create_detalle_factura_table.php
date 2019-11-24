<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleFacturaTable extends Migration
{
   
    public function up()
    {
        Schema::create('detalle_factura', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('empleado_orden_id')->unsigned();
            $table->bigInteger('factura_id')->unsigned();
            $table->integer('valor');
            
            $table->foreign('empleado_orden_id')->references('id')->on('empleado_orden')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('factura_id')->references('id')->on('facturas')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('detalle_factura');
    }
}
