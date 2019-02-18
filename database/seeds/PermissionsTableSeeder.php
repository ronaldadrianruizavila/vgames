<?php

	use Caffeinated\Shinobi\Models\Permission;
	use Illuminate\Database\Seeder;

	class PermissionsTableSeeder extends Seeder
	{
		/**
		 * Auto generated seed file.
		 */
		public function run()
		{
			//usuario
			Permission::create(
					[
							'name'=>'Editar users',
							'slug'=>'users.edit',
							'description'=>'editar users para el evento',
					]
			);
			Permission::create(
					[
							'name'=>'Ver users',
							'slug'=>'users.index',
							'description'=>'ver users para el evento',
					]
			);


			//salas
			Permission::create(
					[
							'name'=>'Crear Salas',
							'slug'=>'sala.create',
							'description'=>'crear salas para el evento',
					]
			);
			Permission::create(
					[
							'name'=>'Editar Salas',
							'slug'=>'sala.edit',
							'description'=>'editar salas para el evento',
					]
			);
			Permission::create(
					[
							'name'=>'Ver Salas',
							'slug'=>'sala.index',
							'description'=>'ver salas para el evento',
					]
			);
			//exposiciones
			Permission::create(
					[
							'name'=>'Crear exposiciones',
							'slug'=>'exposicion.create',
							'description'=>'crear exposiciones para el evento',
					]
			);
			Permission::create(
					[
							'name'=>'Actualizar exposiciones',
							'slug'=>'exposicion.edit',
							'description'=>'editar exposiciones para el evento',
					]
			);
			Permission::create(
					[
							'name'=>'Ver exposiciones',
							'slug'=>'exposicion.index',
							'description'=>'Ver exposiciones del evento',
					]
			);
			//expositor
			Permission::create(
					[
							'name'=>'Crear expositores',
							'slug'=>'expositor.create',
							'description'=>'Crear expositores del evento',
					]
			);
			Permission::create(
					[
							'name'=>'Editar expositores',
							'slug'=>'expositor.edit',
							'description'=>'Editar expositores del evento',
					]
			);


		}
	}