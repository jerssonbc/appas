<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTblaUsuario extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbla_usuario', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre',50);
			$table->string('apellidos',70);
			$table->string('email',62);
			$table->string('password',32);
			$table->unsignedInteger('estado_id');
			$table->foreign('estado_id')->references('id')->on('tbla_estado');
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
		Schema::table('tbla_usuario', function(Blueprint $table)
		{
			//
		});
	}

}
