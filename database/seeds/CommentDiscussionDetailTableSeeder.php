<?php

use Illuminate\Database\Seeder;

class CommentDiscussionDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 30; $i++) { 
        	DB::table('comment_detail_discussions')->insert([
	            'comment_detail_discussion_content' => 'Nội dung bình luận thảo luận chi tiết '.$i.' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae quasi corrupti quis facilis porro deserunt perferendis assumenda eum corporis quisquam.',
	            'id_comment_discussion' => rand(1, 5),
	            'id_user' => rand(1, 4),
	            'created_at' => date("Y-m-d"),
	        ]);
        }
    }
}
