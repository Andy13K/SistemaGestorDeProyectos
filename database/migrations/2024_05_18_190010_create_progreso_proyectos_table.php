<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgresoProyectosTable extends Migration
{
    public function up()
    {
        Schema::create('progreso_proyectos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('proyecto_id');
            $table->decimal('porcentaje', 5, 2); // porcentaje de completitud (0.00 a 100.00)
            $table->text('descripcion')->nullable(); // descripción del progreso
            $table->timestamps();

            // Clave foránea para la relación con la tabla proyectos
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('progreso_proyectos');
    }
}

