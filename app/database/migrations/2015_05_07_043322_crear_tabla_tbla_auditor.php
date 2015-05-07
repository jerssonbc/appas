<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTblaAuditor extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbla_auditor', function(Blueprint $table)
		{
			//
			$table->increments('id');
			$table->string('apellidos',50);
			$table->string('nombre',50);
			$table->char('dni',8);
			$table->string('telefono',16);
			$table->string('celular',16);
			$table->string('direccion',60);
			$table->string('carrera_profesional',100);
			$table->unsignedInteger('equipo_auditoria_id');
			$table->foreign('equipo_auditoria_id')->references('id')->on('tbla_equipo_auditoria');
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
		Schema::drop('tbla_auditor');
	}

}
