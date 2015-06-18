<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTblaPruebacumplimiento extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbla_pruebacumplimiento', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('titulo');
			$table->date('fecha_inicio');
			$table->date('fecha_fin');
			$table->unsignedInteger('personaentrevistar_id');
			$table->foreign('personaentrevistar_id')->references('id')->on('tbla_personaentrevistar');

			$table->unsignedInteger('marco_ref_internacional_id');
			$table->foreign('marco_ref_internacional_id')->references('id')->on('tbla_marco_ref_internacional');

			$table->unsignedInteger('objetivos_especificos_id');
			$table->foreign('objetivos_especificos_id')->references('id')->on('tbla_objetivos_especificos');
			
			$table->unsignedInteger('planauditoria_id');
			$table->foreign('planauditoria_id')->references('id')->on('tbla_planauditoria');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tbla_pruebacumplimiento');
	}

}
