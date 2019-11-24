<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadoOrdenTable extends Migration
{
    
    public function up()
    {
        Schema::create('empleado_orden', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->bigInteger('orden_id')->unsigned();
            $table->bigInteger('empleado_id')->unsigned();
            $table->integer('cantidad');
            $table->integer('estado');
            $table->morphs('serviceable');
            $table->foreign('orden_id')->references('id')->on('ordenes')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('empleado_id')->references('id')->on('empleados')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('empleado_orden');
    }
}
