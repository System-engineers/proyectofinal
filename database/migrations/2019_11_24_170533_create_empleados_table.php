<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cedula');
            $table->string('nombres',150);
            $table->string('apellidos',150);
            $table->string('direccion',250);
            $table->string('telefono',20);
            $table->string('email',250);
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
