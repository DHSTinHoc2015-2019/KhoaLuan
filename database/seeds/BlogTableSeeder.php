<?php

use Illuminate\Database\Seeder;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 6; $i++) { 
        	DB::table('blogs')->insert([
	            'title' => 'Tiêu đề bài viết '.$i,
	            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...',
	            'blog_content' => 'Nội dung Blog '.$i.'\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae quasi corrupti quis facilis porro deserunt perferendis assumenda eum corporis quisquam. Delectus magnam labore maxime veniam, natus accusantium, quasi tempore praesentium.',
	            'blog_image' => $i.'.jpg',
	            'id_user' => rand(1, 4),
	            'created_at' => date("Y-m-d"),
	        ]);
        }
    }
}
