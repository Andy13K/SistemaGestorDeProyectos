<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateForeignKeysInAsignacionrecursosAndRolesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asignacionrecursos', function (Blueprint $table) {
            // Drop the existing foreign key constraint
            $table->dropForeign(['usuario_id']);
            // Rename the column to user_id
            $table->renameColumn('usuario_id', 'user_id');
            // Add the new foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('roles', function (Blueprint $table) {
            // Add the new foreign key constraint if applicable
            // For example, if roles table needs to reference users table
            // $table->foreign('some_column')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asignacionrecursos', function (Blueprint $table) {
            // Drop the new foreign key constraint
            $table->dropForeign(['user_id']);
            // Rename the column back to usuario_id
            $table->renameColumn('user_id', 'usuario_id');
            // Add the old foreign key constraint
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
        });

        Schema::table('roles', function (Blueprint $table) {
            // Drop the foreign key constraint if applicable
            // $table->dropForeign(['some_column']);
        });
    }
}


