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
                'title' => $faker->realText(40),
                'discussion_content' => $faker->realText(1000),
                'id_user' => rand(1, 4),
                'id_discussion_type' => rand(1, 6),
                'created_at' => date("Y-m-d"),
            ]);
        }

        DB::table('discussions')->insert([
            'title' => 'Tìm cách đo TPK hoặc TCK',
            'discussion_content' => 'Xin chào tất cả mọi người! :) tôi là một sinh viên tiến sĩ và tôi sẽ sử dụng tpack trong luận án của tôi. Cụ thể là mình đang tìm cách đo tpk hoặc tck (bên kia sử dụng quy mô tpack gốc). Ai có thể giới thiệu bài viết cho tôi để đọc được không? Tôi chỉ tìm thấy một vài người. Cảm ơn!',
            'id_user' => rand(1, 4),
            'id_discussion_type' => 6,
            'created_at' => date("Y-m-d"),
        ]);

        DB::table('discussions')->insert([
            'title' => 'Tìm cách đo TPK hoặc TCK',
            'discussion_content' => 'Xin chào tất cả mọi người! :) tôi là một sinh viên tiến sĩ và tôi sẽ sử dụng tpack trong luận án của tôi. Cụ thể là mình đang tìm cách đo tpk hoặc tck (bên kia sử dụng quy mô tpack gốc). Ai có thể giới thiệu bài viết cho tôi để đọc được không? Tôi chỉ tìm thấy một vài người. Cảm ơn!',
            'id_user' => rand(1, 4),
            'id_discussion_type' => 5,
            'created_at' => date("Y-m-d"),
        ]);

        DB::table('discussions')->insert([
            'title' => 'So sánh của tpack trên 2 quốc gia',
            'discussion_content' => 'Có hứng thú với tpack không? Đây là một sự so sánh của tpack trên 2 quốc gia. Nếu bạn quan tâm đến việc trở thành một phần của dự án nghiên cứu tpack quốc tế lớn hơn, xin vui lòng liên hệ với tôi. https://onlinelibrary.wiley.com/doi/abs/10.1111/bjet.12707',
            'id_user' => rand(1, 4),
            'id_discussion_type' => 3,
            'created_at' => date("Y-m-d"),
        ]);
    }
}
