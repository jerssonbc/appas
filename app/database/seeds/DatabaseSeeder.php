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

	}

}
