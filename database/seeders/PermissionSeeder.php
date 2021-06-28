<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'access_users','show_user','create_user','update_user','delete_user',
            'access_roles','show_roles','create_roles','update_roles','delete_roles',
            'access_permissions','show_permissions','create_permissions','update_permissions','delete_permissions'
        ];
        for ($i = 0; $i <= count($data)-1; $i++) {
            DB::table('permissions')->insert([
                'name' => $data[$i],
            ]);
        }
    }
}
