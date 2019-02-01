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
    	// DB::table('discussions')->insert([
     //        'title' => '0',
     //        'discussion_content' => '0',
     //        'id_user' => 1,
     //        'id_discussion_type' => 1,
     //        'created_at' => date("Y-m-d"),
     //    ]);

        for ($i = 1; $i <= 20; $i++) { 
        	DB::table('discussions')->insert([
	            'title' => 'Mô tả cho câu hỏi thảo luận '.$i,
	            'discussion_content' => 'Nội dung câu hỏi '.$i.' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae quasi corrupti quis facilis porro deserunt perferendis assumenda eum corporis quisquam. Delectus magnam labore maxime veniam, natus accusantium, quasi tempore praesentium.',
	            'id_user' => rand(1, 4),
	            'id_discussion_type' => rand(1, 7),
	            'created_at' => date("Y-m-d"),
	        ]);
        }
    }
}
