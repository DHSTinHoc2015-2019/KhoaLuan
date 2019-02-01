<?php

use Illuminate\Database\Seeder;

class CommentDiscussionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) { 
        	DB::table('comment_discussions')->insert([
	            'comment_discussion_content' => 'Nội dung bình luận thảo luận '.$i.' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae quasi corrupti quis facilis porro deserunt perferendis assumenda eum corporis quisquam.',
	            'id_discussion' => rand(1, 5),
	            'id_user' => rand(1, 4),
	            'created_at' => date("Y-m-d"),
	        ]);
        }
    }
}
