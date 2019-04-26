<?php

use Illuminate\Database\Seeder;

class UserManualTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('user_manuals')->insert([
            'title' => 'Đăng ký tài khoản',
            'user_manual_content' => $faker->text(2000),
            'created_at' => date("Y-m-d"),
        ]);

        DB::table('user_manuals')->insert([
            'title' => 'Khôi phục tài khoản khi quên mật khẩu',
            'user_manual_content' => $faker->text(2000),
            'created_at' => date("Y-m-d"),
        ]); 

        DB::table('user_manuals')->insert([
            'title' => 'Quyền gửi bài vào forum',
            'user_manual_content' => $faker->text(2000),
            'created_at' => date("Y-m-d"),
        ]);

        DB::table('user_manuals')->insert([
            'title' => 'Vì sao đã đăng ký nhưng không gửi bài được?',
            'user_manual_content' => $faker->text(2000),
            'created_at' => date("Y-m-d"),
        ]);

        DB::table('user_manuals')->insert([
            'title' => 'Cách tạo bài viết mới',
            'user_manual_content' => $faker->text(2000),
            'created_at' => date("Y-m-d"),
        ]);

        DB::table('user_manuals')->insert([
            'title' => 'Cách tạo thảo luận mới',
            'user_manual_content' => $faker->text(2000),
            'created_at' => date("Y-m-d"),
        ]);

        DB::table('user_manuals')->insert([
            'title' => 'Trả lời một bài viết trên diễn đàn',
            'user_manual_content' => $faker->text(2000),
            'created_at' => date("Y-m-d"),
        ]);
    }
}
