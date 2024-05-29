<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLiderIdInProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            // Verificar si la clave foránea actual existe antes de eliminarla
            $foreignKeyName = $this->getForeignKeyName('proyectos', 'lider_id');
            if ($foreignKeyName) {
                $table->dropForeign([$foreignKeyName]);
            }

            // Agregar la nueva relación con la tabla `users`
            $table->foreign('lider_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            // Verificar si la clave foránea actual existe antes de eliminarla
            $foreignKeyName = $this->getForeignKeyName('proyectos', 'lider_id');
            if ($foreignKeyName) {
                $table->dropForeign([$foreignKeyName]);
            }

            // Restaurar la relación original con la tabla `usuarios`
            $table->foreign('lider_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Get the foreign key name for a table and column.
     *
     * @param  string  $table
     * @param  string  $column
     * @return string|null
     */
    protected function getForeignKeyName($table, $column)
    {
        $sm = Schema::getConnection()->getDoctrineSchemaManager();
        $indexes = $sm->listTableForeignKeys($table);
        foreach ($indexes as $index) {
            if (in_array($column, $index->getColumns())) {
                return $index->getName();
            }
        }
        return null;
    }
}

