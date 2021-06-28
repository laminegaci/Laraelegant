<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $data = [];

        for ($i = 1; $i <= 1 ; $i++) {
            array_push($data, [
                'name'     => 'Mohamed lamine',
                'email'    => 'mohamed61lamine@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('123456'),
                'avatar' => 'images/users/deffault-avatar.png',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),              
            ]);
        }
        for ($i = 1; $i <= 5 ; $i++) {
            array_push($data, [
                'name'     => $faker->name(),
                'email'    => $faker->email,
                'email_verified_at' => now(),
                'password' => bcrypt('123456'),
                'avatar' => 'images/users/deffault-avatar.png',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        User::insert($data);

        for ($i = 1; $i <= 1 ; $i++) {
            DB::table('role_user')->insert([
                'role_id'     => '1',
                'user_id'     => '1',
            ]);
        }
        $users_id = User::pluck('id')->toArray();
        //$roles_id = Role::pluck('id')->toArray();
        $roles_id = [2,3];
        $size = count($users_id);
        for ($i = 2; $i <= $size ; $i++) {
            DB::table('role_user')->insert([
                'role_id'     => $faker->randomElement($roles_id),
                'user_id'     => $i,
            ]);
        }
        
    }
}
