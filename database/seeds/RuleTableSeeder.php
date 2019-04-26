<?php

use Illuminate\Database\Seeder;

class RuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('rules')->insert([
            'title' => 'Nội quy diễn đàn',
            'rule_content' => $faker->text(2000),
            'created_at' => date("Y-m-d"),
        ]);

        DB::table('rules')->insert([
            'title' => 'Về việc đăng bài viết, thảo luận lên diễn đàn',
            'rule_content' => $faker->text(2000),
            'created_at' => date("Y-m-d"),
        ]); 

        DB::table('rules')->insert([
            'title' => 'Chửi nhau; xúc phạm nhau',
            'rule_content' => $faker->text(2000),
            'created_at' => date("Y-m-d"),
        ]);
    }
}
