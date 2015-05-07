<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTblaEquipoAuditoria extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbla_equipo_auditoria', function(Blueprint $table)
		{
			//
			$table->increments('id');
			$table->unsignedInteger('planauditoria_id');
			$table->foreign('planauditoria_id')->references('id')->on('tbla_planauditoria');
			$table->boolean('estado')->nullable();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tbla_equipo_auditoria');
	}

}
