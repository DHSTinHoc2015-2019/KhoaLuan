<?php

use Illuminate\Database\Seeder;

class CommentBlogTableSeeder extends Seeder
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
        	DB::table('comment_blogs')->insert([
	            'comment_blog_content' => 'Nội dung bình luận blog '.$i.$faker->realText(200),
	            'id_blog' => rand(1, 5),
	            'id_user' => rand(1, 4),
	            'created_at' => date("Y-m-d"),
	        ]);
        }
    }
}
