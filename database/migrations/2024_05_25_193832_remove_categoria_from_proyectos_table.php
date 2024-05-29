<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveCategoriaFromProyectosTable extends Migration
{
    public function up()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->dropColumn('categoria');
        });
    }

    public function down()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->enum('categoria', ['software', 'redes', 'hardware', 'sistema ERP', 'sistema TVP']);
        });
    }
}

