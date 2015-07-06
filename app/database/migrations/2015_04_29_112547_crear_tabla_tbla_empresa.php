<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTblaEmpresa extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbla_empresa', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('usuario_id');
			$table->foreign('usuario_id')->references('id')->on('tbla_usuario');
			$table->string('razon_social',100);
			$table->text('giro_negocio');
			$table->text('resena_historica');
			$table->decimal('ug_latitud',9,2)->nullable();
			$table->decimal('ug_longitud',9,2)->nullable();
			$table->boolean('estado')->nullable();
			$table->timestamps();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Schema::drop('tbla_empresa');
	}

}
