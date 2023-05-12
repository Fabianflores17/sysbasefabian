<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSoporteServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('soporte_servicios', function (Blueprint $table) {
            $table->foreign(['cliente_id'], 'fk_soporte_servicios_soporte_clientes1')->references(['id'])->on('soporte_clientes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['equipo_id'], 'fk_soporte_servicios_soporte_equipos1')->references(['id'])->on('soporte_equipos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['usuario_id'], 'fk_soporte_servicios_user1')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('soporte_servicios', function (Blueprint $table) {
            $table->dropForeign('fk_soporte_servicios_soporte_clientes1');
            $table->dropForeign('fk_soporte_servicios_soporte_equipos1');
            $table->dropForeign('fk_soporte_servicios_user1');
        });
    }
}
