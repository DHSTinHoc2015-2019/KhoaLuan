<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('users')->insert([
            // 'name' => $faker->name,
            'name' => 'tan',
            'email' => 'tan123@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'is_admin' => true,
            'user_image' => '1.jpg',
            'remember_token' => str_random(10),
            'created_at' => date("Y-m-d"),
        ]);
        DB::table('users')->insert([
            // 'name' => $faker->name,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'is_admin' => true,
            'user_image' => '2.jpg',
            'remember_token' => str_random(10),
            'created_at' => date("Y-m-d"),
        ]);
        DB::table('users')->insert([
            // 'name' => $faker->name,
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'is_admin' => false,
            'user_image' => '3.jpg',
            'remember_token' => str_random(10),
            'created_at' => new DateTime,
        ]);
        DB::table('users')->insert([
            // 'name' => $faker->name,
            'name' => 'user2',
            'email' => $faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'is_admin' => false,
            'user_image' => '4.jpg',
            'remember_token' => str_random(10),
            'created_at' => new DateTime,
        ]);
        DB::table('users')->insert([
            'name' => 'user3',
            'email' => $faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'is_admin' => false,
            'remember_token' => str_random(10),
            'created_at' => new DateTime,
        ]);
        DB::table('users')->insert([
            'name' => 'user4',
            'email' => $faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'is_admin' => false,
            'remember_token' => str_random(10),
            'created_at' => new DateTime,
        ]);
        DB::table('users')->insert([
            'name' => 'user5',
            'email' => $faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'is_admin' => false,
            'remember_token' => str_random(10),
            'created_at' => new DateTime,
        ]);
        DB::table('users')->insert([
            'name' => 'user6',
            'email' => $faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'is_admin' => false,
            'remember_token' => str_random(10),
            'created_at' => new DateTime,
        ]);
    }
}
