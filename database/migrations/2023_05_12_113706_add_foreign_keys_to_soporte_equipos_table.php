<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSoporteEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('soporte_equipos', function (Blueprint $table) {
            $table->foreign(['tipo_id'], 'fk_soporte_equipos_soporte_equipo_tipos')->references(['id'])->on('soporte_equipo_tipos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('soporte_equipos', function (Blueprint $table) {
            $table->dropForeign('fk_soporte_equipos_soporte_equipo_tipos');
        });
    }
}
