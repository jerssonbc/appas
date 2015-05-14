<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		
		DB::table('tbla_estado')->insert(array('id' =>1,'estado' => 'Desactivado'));
      	DB::table('tbla_estado')->insert(array('id' =>2,'estado' => 'Activado'));
      	DB::table('tbla_estado')->insert(array('id' =>3,'estado' => 'Eliminado'));

      	$this->command->info('Estados insertados en la tabla: tbla_estados han sido 3.');


      	DB::table('tbla_cargo')->insert(array('id' =>1,'cargo' => 'Jefe de Auditoria'));
      	DB::table('tbla_cargo')->insert(array('id' =>2,'cargo' => 'Auditor Especialista'));
      	DB::table('tbla_cargo')->insert(array('id' =>3,'cargo' => 'Asistente de Auditoria'));

      	$this->command->info('Cargo insertados, en la tabla tbla_cargo, han sido 3.');

      	DB::table('tbla_tipoaclaracion')->insert(array('id' =>1,'tipo_aclaracion' => 'Se realizara'));
      	DB::table('tbla_tipoaclaracion')->insert(array('id' =>2,'tipo_aclaracion' => 'No se realizara'));

      	$this->command->info('TipoAclaracion insertados, en la tabla tabla_tipoaclaracion, han sido 2.');


	}

}
