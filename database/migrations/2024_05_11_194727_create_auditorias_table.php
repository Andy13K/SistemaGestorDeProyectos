<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditoriasTable extends Migration
{
    public function up()
    {
        Schema::create('auditorias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('proyecto_id');
            $table->timestamp('fecha_auditoria')->useCurrent();
            $table->string('resultado');
            $table->text('observaciones')->nullable();
            $table->timestamps();

            $table->foreign('proyecto_id')->references('id')->on('proyectos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('auditorias');
    }
}
