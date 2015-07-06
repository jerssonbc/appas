<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTblaTipoaclaracion extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbla_tipoaclaracion', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('tipo_aclaracion',100);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Schema::drop('tbla_tipoaclaracion', function(Blueprint $table)
		// {
		// 	//
		// });
	}

}
