<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTblaPlanauditoria extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbla_planauditoria', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('realidad_problematica');
			$table->string('titulo_auditoria',200);
			$table->unsignedInteger('empresa_id');
			$table->foreign('empresa_id')->references('id')->on('tbla_empresa');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tbla_planauditoria', function(Blueprint $table)
		{
			//
		});
	}

}
