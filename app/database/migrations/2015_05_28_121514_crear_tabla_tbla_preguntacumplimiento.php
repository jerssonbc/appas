<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTblaPreguntacumplimiento extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbla_preguntacumplimiento', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('pregunta');
			$table->char('respuesta',4);
			$table->text('obervaciones');
			$table->unsignedInteger('pruebacumplimiento_id');
			$table->foreign('pruebacumplimiento_id')->references('id')->on('tbla_pruebacumplimiento');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tbla_preguntacumplimiento');
		
	}

}
