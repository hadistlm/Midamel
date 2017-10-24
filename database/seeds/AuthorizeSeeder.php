<?php

use Illuminate\Database\Seeder;

class AuthorizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = [
        	'slug' => "admin",
        	'name' => "Administrator",
        	'permissions' => [
        		"admin" => true
        	]
        ];

        Sentinel::getRoleRepository()->createModel()->fill($role_admin)->save();

        $adminrole = Sentinel::findRoleByName("Administrator");

        $role_writer = [
        	'slug' => "user",
        	'name' => "User",
        	'permissions' => []
        ];

        Sentinel::getRoleRepository()->createModel()->fill($role_writer)->save();
        $writerrole = Sentinel::findRoleByName('User');
    }
}
