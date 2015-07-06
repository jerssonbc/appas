<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblaDetaPcniupdate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbla_deta_pc_ni', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('pruebacumplimiento_id');
			$table->foreign('pruebacumplimiento_id')->references('id')->on('tbla_pruebacumplimiento');
			$table->unsignedInteger('normativa_institucional_id');
			$table->foreign('normativa_institucional_id')->references('id')->on('tbla_normativa_institucional');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tbla_deta_pc_ni', function(Blueprint $table)
		{
			//
		});
	}

}
