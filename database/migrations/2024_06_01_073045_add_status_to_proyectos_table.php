<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToProyectosTable extends Migration
{
    public function up()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->string('status')->default('en_progreso');
        });
    }

    public function down()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}

