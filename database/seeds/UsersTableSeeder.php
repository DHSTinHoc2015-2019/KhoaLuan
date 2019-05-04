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
            'name' => 'tan',
            'email' => 'tan123@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'is_admin' => true,
            'user_image' => '1.jpg', 
            'display_name' => 'Trần Quang Tân',
            'gender' => 'Nam',
            'remember_token' => str_random(10),
            'created_at' => date("Y-m-d"),
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'is_admin' => true,
            'user_image' => '2.jpg',
            'display_name' => 'Trần Quang Tân',
            'birthday' => '11-09-1990',
            'gender' => 'Nam',
            'phone' => '0974433226',
            'gender' => 'Nam',
            'address' => 'Quảng Trị',
            'remember_token' => str_random(10),
            'created_at' => date("Y-m-d"),
        ]);
        
        for ($i=1; $i < 7; $i++) { 
            DB::table('users')->insert([
                'name' => 'user' . $i,
                'email' => 'user' . $i . '@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('123123'),
                'is_admin' => false,
                'user_image' => $i . '.jpg',
                'display_name' => 'User ' . $i,
                'birthday' => '1' . $i . '-09-1997',
                'gender' => 'Nam',
                'phone' => '0974433226',
                'gender' => 'Nam',
                'address' => 'Quảng Trị',
                'remember_token' => str_random(10),
                'created_at' => new DateTime,
            ]);
        }
    }
}
