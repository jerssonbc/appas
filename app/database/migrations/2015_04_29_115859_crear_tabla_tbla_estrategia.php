<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTblaEstrategia extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbla_estrategia', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('titulo',100);
			$table->text('estrategia');
			$table->unsignedInteger('empresa_id');
			$table->foreign('empresa_id')->references('id')->on('tbla_empresa');
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
		// Schema::drop('tbla_estrategia');
	}

}
