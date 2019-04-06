<?php

use Illuminate\Database\Seeder;

class DiscussionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 1; $i <= 20; $i++) { 
        	DB::table('discussions')->insert([
	            'title' => 'Mô tả cho câu hỏi thảo luận '.$i,
	            'discussion_content' => 'Nội dung câu hỏi '.$i.$faker->realText(1000),
	            'id_user' => rand(1, 4),
	            'id_discussion_type' => rand(1, 7),
	            'created_at' => date("Y-m-d"),
	        ]);
        }
    }
}
