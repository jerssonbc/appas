<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblaDetaPcmiupdate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbla_deta_pc_mi', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('pruebacumplimiento_id');
			$table->foreign('pruebacumplimiento_id')->references('id')->on('tbla_pruebacumplimiento');
			$table->unsignedInteger('marco_ref_internacional_id');
			$table->foreign('marco_ref_internacional_id')->references('id')->on('tbla_marco_ref_internacional');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tbla_deta_pc_mi', function(Blueprint $table)
		{
			//
		});
	}
	

}
