<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 6; $i++) { 
        	DB::table('news')->insert([
	            'title' => 'Tiêu đề tin tức '.$i,
	            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...',
	            'news_content' => 'Nội dung tin tức '.$i,
	            'news_image' => $i.'.jpg',
	            'created_at' => date("Y-m-d"),
	        ]);
        }
    }
}