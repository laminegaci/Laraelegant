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
        $role->permissions()->attach([1,2,3,4,5]);
    }
}
