<?php

use Illuminate\Database\Seeder;

class CommentDetailBlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 1; $i <= 30; $i++) { 
        	DB::table('comment_detail_blogs')->insert([
	            'comment_detail_blog_content' => 'Nội dung bình luận blog chi tiết '.$i.$faker->realText(100),
	            'id_comment_blog' => rand(1, 5),
	            'id_user' => rand(1, 5),
	            'created_at' => date("Y-m-d"),
	        ]);
        }
    }
}
