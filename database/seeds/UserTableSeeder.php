<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\User', 1)->create([
        	'name' => 'Sam',
        	'email' => 'sam@gmail.com',
        	'user_type_id' => 1,
        	'email_verified_at' => date('Y-m-d H:i:s')
        ]);

        factory('App\User', 1)->create([
        	'name' => 'Michelle',
        	'email' => 'michelle@gmail.com',
        	'user_type_id' => 1,
        	'email_verified_at' => date('Y-m-d H:i:s')
        ]);

        factory('App\User', 1)->create([
        	'name' => 'John',
        	'email' => 'john@gmail.com',
        	'user_type_id' => 1,
        	'email_verified_at' => date('Y-m-d H:i:s')
        ]);

        factory('App\Usertype', 1)->create([
        	'user_type' => 'Manager',
        ]);

        factory('App\Usertype', 1)->create([
        	'user_type' => 'Supervisor',
        ]);

        factory('App\Usertype', 1)->create([
        	'user_type' => 'Sales Rep',
        ]);
    }
    
}
