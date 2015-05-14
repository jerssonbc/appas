<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTblaAclaracion extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbla_aclaracion', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('aclaracion');
			$table->unsignedInteger('planauditoria_id');
			$table->foreign('planauditoria_id')->references('id')->on('tbla_planauditoria');
			$table->unsignedInteger('tipoaclaracion_id');
			$table->foreign('tipoaclaracion_id')->references('id')->on('tbla_tipoaclaracion');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tbla_aclaracion', function(Blueprint $table)
		{
			//
		});
	}

}
