<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTblaPerfil extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbla_perfil', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('perfil');
			$table->unsignedInteger('perfilequipo_id');
			$table->foreign('perfilequipo_id')->references('id')->on('tbla_perfilequipo');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tbla_perfil', function(Blueprint $table)
		{
			//
		});
	}

}
