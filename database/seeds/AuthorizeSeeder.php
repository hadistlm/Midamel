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
        	'permissions' => [
        		'articles.index' => true,
        		'articles.create' => true,
        		'articles.store' => true,
        		'articles.show' => true,
        		'articles.edit' => true,
        		'articles.update' => true,
        		'add' => true,
        		'change' => true,
        		'delete' => true
        	]
        ];

        Sentinel::getRoleRepository()->createModel()->fill($role_writer)->save();
        $writerrole = Sentinel::findRoleByName('User');
    }
}
