<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateForeignKeyOnAuditoriasTable extends Migration
{
    public function up()
    {
        Schema::table('auditorias', function (Blueprint $table) {
            $table->dropForeign(['proyecto_id']);
            $table->foreign('proyecto_id')
                ->references('id')->on('proyectos')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('auditorias', function (Blueprint $table) {
            $table->dropForeign(['proyecto_id']);
            $table->foreign('proyecto_id')
                ->references('id')->on('proyectos')
                ->onDelete('restrict');
        });
    }
}
