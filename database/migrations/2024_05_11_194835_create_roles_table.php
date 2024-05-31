<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->timestamps();
        });

        // Poblar la tabla de roles con valores predeterminados
        DB::table('roles')->insert([
            ['nombre' => 'líder de proyecto'],
            ['nombre' => 'integrante de equipo de proyecto'],
            ['nombre' => 'cliente'],
        ]);

        // Agregar el campo 'role_id' a la tabla de usuarios
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->nullable();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
        });
    }

    public function down()
    {
        // Eliminar la relación entre usuarios y roles
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
        });

        // Eliminar la tabla de roles
        Schema::dropIfExists('roles');
    }
}


