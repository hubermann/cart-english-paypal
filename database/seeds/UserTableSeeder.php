<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$role_admin = Role::where('name', 'Superadmin')->first();
        $user = new User();
        $user->name = "Gabriel Hubermann";
        $user->email = "hubermann@gmail.com";
        $user->password = bcrypt("password");
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
