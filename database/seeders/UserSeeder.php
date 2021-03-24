<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\User;

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
                'avatar' => 'images/users/5.jpg',
                'role_id' => '1',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),              
            ]);
        }
        for ($i = 1; $i <= 10 ; $i++) {
            array_push($data, [
                'name'     => $faker->name(),
                'email'    => $faker->email,
                'email_verified_at' => now(),
                'password' => bcrypt('123456'),
                'avatar' => 'images/users/5.jpg',
                'role_id'     => '2',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        User::insert($data);
    }
}
