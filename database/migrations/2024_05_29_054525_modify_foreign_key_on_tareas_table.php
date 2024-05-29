<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyForeignKeyOnTareasTable extends Migration
{
    public function up()
    {
        Schema::table('tareas', function (Blueprint $table) {
            // Drop the existing foreign key constraint
            $table->dropForeign(['proyecto_id']);

            // Add the new foreign key constraint with cascade delete
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('tareas', function (Blueprint $table) {
            // Drop the cascade foreign key constraint
            $table->dropForeign(['proyecto_id']);

            // Add the original foreign key constraint without cascade delete
            $table->foreign('proyecto_id')->references('id')->on('proyectos');
        });
    }
}
