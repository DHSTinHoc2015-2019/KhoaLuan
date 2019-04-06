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
        $faker = Faker\Factory::create();
        for ($i = 1; $i <= 6; $i++) { 
        	DB::table('news')->insert([
	            'title' => 'Tiêu đề tin tức '.$i,
	            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...',
	            'news_content' => 'Nội dung tin tức '.$i. $faker->realText(5000),
	            'news_image' => $i.'.jpg',
                'featured' => true,
	            'created_at' => date("Y-m-d"),
	        ]);
        }

        for ($i = 7; $i <= 15; $i++) {
            $color = substr(uniqid(),-6);
            $imgSVG = '<svg width="100%" height="170"><rect x="5" y="5" rx="10" ry="10" width="97%" height="160" style="fill: #'. $color . ';stroke:black;stroke-width:5;"></rect> </svg>';
            DB::table('news')->insert([
                'title' => 'Tiêu đề tin tức '.$i,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...',
                'news_content' => 'Nội dung tin tức '.$i. $faker->realText(5000),
                'news_image' => $imgSVG,
                'created_at' => date("Y-m-d"),
            ]);
        }
    }
}