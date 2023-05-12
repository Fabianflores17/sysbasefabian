<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoporteServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soporte_servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('usuario_id')->index('fk_soporte_servicios_user1_idx');
            $table->unsignedInteger('cliente_id')->index('fk_soporte_servicios_soporte_clientes1_idx');
            $table->unsignedInteger('equipo_id')->index('fk_soporte_servicios_soporte_equipos1_idx');
            $table->text('problema');
            $table->text('solucion');
            $table->text('recomendaciones')->nullable();
            $table->dateTime('fecha_recibido');
            $table->dateTime('fecha_inicio')->nullable();
            $table->dateTime('fecha_fin')->nullable();
            $table->dateTime('fecha_entrega')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soporte_servicios');
    }
}
