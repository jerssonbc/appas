<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTblaAuditorCargo extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbla_auditor_cargo', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('cargo_id');
			$table->foreign('cargo_id')->references('id')->on('tbla_cargo');
			$table->unsignedInteger('planauditoria_id');
			$table->foreign('planauditoria_id')->references('id')->on('tbla_planauditoria');
			$table->unsignedInteger('auditor_id');
			$table->foreign('auditor_id')->references('id')->on('tbla_auditor');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tbla_auditor_cargo');
	}

}
