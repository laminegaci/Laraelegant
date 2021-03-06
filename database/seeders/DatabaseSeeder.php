<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        //\App\Models\User::factory(10)->create();
        $this->call([RoleSeeder::class]);
        $this->call([UserSeeder::class]);
        $this->call([PermissionSeeder::class]);  
        $role = Role::find(1);
        $role->permissions()->attach([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15]);
        $role = Role::find(2);
        $role->permissions()->attach([1,2,3]);
        $role = Role::find(3);
        $role->permissions()->attach([1]);

    }
}
