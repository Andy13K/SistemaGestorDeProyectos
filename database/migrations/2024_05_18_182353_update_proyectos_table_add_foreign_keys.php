<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateProyectosTableAddForeignKeys extends Migration
{
    public function up()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            // Verificar y eliminar la clave foránea 'proyectos_categoria_id_foreign' si existe
            $sm = Schema::getConnection()->getDoctrineSchemaManager();
            $foreignKeys = $sm->listTableForeignKeys('proyectos');
            $foreignKeyNames = array_map(function ($fk) {
                return $fk->getName();
            }, $foreignKeys);

            if (in_array('proyectos_categoria_id_foreign', $foreignKeyNames)) {
                $table->dropForeign(['categoria_id']);
            }

            if (in_array('proyectos_cliente_id_foreign', $foreignKeyNames)) {
                $table->dropForeign(['cliente_id']);
            }

            // Añadir las nuevas columnas si no existen
            if (!Schema::hasColumn('proyectos', 'categoria_id')) {
                $table->unsignedBigInteger('categoria_id')->after('descripcion');
            }

            if (!Schema::hasColumn('proyectos', 'cliente_id')) {
                $table->unsignedBigInteger('cliente_id')->nullable()->change();
            }

            // Añadir las claves foráneas
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            // Eliminar las claves foráneas
            $table->dropForeign(['categoria_id']);
            $table->dropForeign(['cliente_id']);

            // Eliminar las columnas añadidas
            if (Schema::hasColumn('proyectos', 'categoria_id')) {
                $table->dropColumn('categoria_id');
            }
            if (Schema::hasColumn('proyectos', 'cliente_id')) {
                // Restaurar la columna cliente_id a su estado anterior
                $table->unsignedBigInteger('cliente_id')->nullable(false)->change();
                $table->foreign('cliente_id')->references('id')->on('usuarios')->onDelete('cascade');
            }
        });
    }
}


