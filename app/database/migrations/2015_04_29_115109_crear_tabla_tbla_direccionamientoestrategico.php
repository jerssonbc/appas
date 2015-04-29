<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTblaDireccionamientoestrategico extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbla_direccionamientoestrategico', function(Blueprint $table)
		{
			$table->integer('empresa_id')->unsigned();
			$table->foreign('empresa_id')->references('id')->on('tbla_empresa');
			$table->primary('empresa_id');
			$table->text('mision');
			$table->text('vision');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tbla_direccionamientoestrategico', function(Blueprint $table)
		{
			//
		});
	}

}
