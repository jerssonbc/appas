<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblaDetaPcumplimientoMnacional extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbla_deta_pc_mn', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('pruebacumplimiento_id');
			$table->foreign('pruebacumplimiento_id')->references('id')->on('tbla_pruebacumplimiento');
			$table->unsignedInteger('marco_ref_nacional_id');
			$table->foreign('marco_ref_nacional_id')->references('id')->on('tbla_marco_ref_nacional');
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tbla_deta_pcumplimiento_mnacional', function(Blueprint $table)
		{
			//
		});
	}

}
