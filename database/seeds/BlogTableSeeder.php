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
        $faker = Faker\Factory::create();
        for ($i = 1; $i <= 6; $i++) { 
        	DB::table('blogs')->insert([
	            'title' => 'Tiêu đề bài viết '.$i,
	            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...',
                // 'blog_content' => 'Nội dung Blog '. $i . $faker->realText($maxNbChars = 5000, $indexSize = 2),
                'blog_content' => 'Nội dung Blog '. $i . $faker->realText(5000),
	            // 'blog_content' => 'Nội dung Blog '. $i . $faker->text(5000),
	            'blog_image' => $i.'.jpg',
                'featured' => true,
	            'id_user' => rand(1, 4),
	            'created_at' => date("Y-m-d"),
	        ]);
        }

        for ($i = 7; $i <= 12; $i++) { 
            DB::table('blogs')->insert([
                'title' => 'Tiêu đề bài viết '.$i,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...',
                'blog_content' => 'Nội dung Blog '. $i . $faker->text(1000),
                'blog_image' => ($i - 6).'.jpg',
                'id_user' => rand(1, 4),
                'created_at' => date("Y-m-d"),
            ]);
        }

        for ($i = 13; $i <= 18; $i++) {
            $color = substr(uniqid(),-6);
            $imgSVG = '<svg width="100%" height="220"><rect x="5" y="5" rx="10" ry="10" width="97%" height="210" style="fill: #' . $color . ';stroke:black;stroke-width:5;"></rect> </svg>';
            DB::table('blogs')->insert([
                'title' => 'Tiêu đề bài viết '.$i,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...',
                'blog_content' => 'Nội dung Blog '. $i . $faker->text(1000),
                'blog_image' => $imgSVG,
                'id_user' => rand(1, 4),
                'created_at' => date("Y-m-d"),
            ]);
        }
    }
}
