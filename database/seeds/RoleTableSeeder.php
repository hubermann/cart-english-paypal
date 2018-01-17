<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new Role();
        $role_user->name = "Superadmin";
        $role_user->description = "Can do all";
        $role_user->save();

        $role_user = new Role();
        $role_user->name = "Frontend";
        $role_user->description = "Can navigate and access to front end";
        $role_user->save();


    }
}
