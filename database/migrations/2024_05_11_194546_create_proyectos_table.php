<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->text('descripcion');
            $table->enum('categoria', ['software', 'redes', 'hardware', 'sistema ERP', 'sistema TVP']);
            $table->unsignedBigInteger('lider_id');
            $table->unsignedBigInteger('cliente_id');
            $table->timestamp('fecha')->useCurrent();
            $table->integer('num_computadoras')->default(0);
            $table->decimal('presupuesto', 10, 2)->default(0.00);
            $table->date('fecha_limite')->nullable();
            $table->timestamps();

            $table->foreign('lider_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('cliente_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('proyectos');
    }
}

