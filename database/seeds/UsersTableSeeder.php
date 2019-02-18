<?php

	use Caffeinated\Shinobi\Models\Role;
	use Illuminate\Database\Seeder;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,20)->create();

        Role::create([
        	'name'=>'Admin',
	        'description'=>'Puede manejar todas las opciones',
	        'slug'=>'admin',
	        'special'=>'all-access'
        ]);
    }
}
