<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('roles')->insert([
                'name' => 'admin',
            ]);
            DB::table('roles')->insert([
                'name' => 'Super-user',
            ]);
            DB::table('roles')->insert([
                'name' => 'user',
            ]);
            
    }
}
