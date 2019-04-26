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
        $faker = Faker\Factory::create();
        for ($i = 1; $i <= 30; $i++) { 
        	DB::table('comment_detail_discussions')->insert([
	            'comment_detail_discussion_content' => $faker->realText(100),
	            'id_comment_discussion' => rand(1, 5),
	            'id_user' => rand(1, 5),
	            'created_at' => date("Y-m-d"),
	        ]);
        }

        DB::table('comment_detail_discussions')->insert([
            'comment_detail_discussion_content' => 'đó là kế hoạch ngay bây giờ nhưng tôi đã nghĩ rằng tôi sẽ chọc xung quanh cho bất kỳ bài viết hiện tại nào trước. 😉 cảm ơn!!',
            'id_comment_discussion' => 21,
            'id_user' => rand(1, 5),
            'created_at' => date("Y-m-d"),
        ]);

        DB::table('comment_detail_discussions')->insert([
            'comment_detail_discussion_content' => 'Tôi đã nhắn tin cho bạn',
            'id_comment_discussion' => 21,
            'id_user' => rand(1, 5),
            'created_at' => date("Y-m-d"),
        ]);

        DB::table('comment_detail_discussions')->insert([
            'comment_detail_discussion_content' => 'http://researchrepository.murdoch.edu.au/id/eprint/27597',
            'id_comment_discussion' => 21,
            'id_user' => rand(1, 5),
            'created_at' => date("Y-m-d"),
        ]);

        DB::table('comment_detail_discussions')->insert([
            'comment_detail_discussion_content' => 'cảm ơn! Đang tải về nó. :)',
            'id_comment_discussion' => 21,
            'id_user' => rand(1, 5),
            'created_at' => date("Y-m-d"),
        ]);

        DB::table('comment_detail_discussions')->insert([
            'comment_detail_discussion_content' => 'Liên kết của bạn đưa tôi đến một trang thư viện tổng hợp?',
            'id_comment_discussion' => 22,
            'id_user' => rand(1, 5),
            'created_at' => date("Y-m-d"),
        ]);

        DB::table('comment_detail_discussions')->insert([
            'comment_detail_discussion_content' => 'Xin lỗi, họ chắc đã thay đổi nó. Tôi đã thay thế nó bằng liên kết researchgate và cũng gửi nó vào hộp thư của bạn cùng với bài báo và giấy hội nghị trên nó: https://www.researchgate.net/publication/329306107_The_evaluation_of_a_pre-service_mathematics_teachers_TPACK_A_case_of_3D_shapes_with_GeoGebra',
            'id_comment_discussion' => 22,
            'id_user' => rand(1, 5),
            'created_at' => date("Y-m-d"),
        ]);

        DB::table('comment_detail_discussions')->insert([
            'comment_detail_discussion_content' => 'đó là kế hoạch ngay bây giờ nhưng tôi đã nghĩ rằng tôi sẽ chọc xung quanh cho bất kỳ bài viết hiện tại nào trước. 😉 cảm ơn!!',
            'id_comment_discussion' => 23,
            'id_user' => rand(1, 5),
            'created_at' => date("Y-m-d"),
        ]);

        DB::table('comment_detail_discussions')->insert([
            'comment_detail_discussion_content' => 'Tôi đã nhắn tin cho bạn',
            'id_comment_discussion' => 23,
            'id_user' => rand(1, 5),
            'created_at' => date("Y-m-d"),
        ]);

        DB::table('comment_detail_discussions')->insert([
            'comment_detail_discussion_content' => 'http://researchrepository.murdoch.edu.au/id/eprint/27597',
            'id_comment_discussion' => 23,
            'id_user' => rand(1, 5),
            'created_at' => date("Y-m-d"),
        ]);

        DB::table('comment_detail_discussions')->insert([
            'comment_detail_discussion_content' => 'cảm ơn! Đang tải về nó. :)',
            'id_comment_discussion' => 23,
            'id_user' => rand(1, 5),
            'created_at' => date("Y-m-d"),
        ]);

        DB::table('comment_detail_discussions')->insert([
            'comment_detail_discussion_content' => 'Liên kết của bạn đưa tôi đến một trang thư viện tổng hợp?',
            'id_comment_discussion' => 24,
            'id_user' => rand(1, 5),
            'created_at' => date("Y-m-d"),
        ]);

        DB::table('comment_detail_discussions')->insert([
            'comment_detail_discussion_content' => 'Xin lỗi, họ chắc đã thay đổi nó. Tôi đã thay thế nó bằng liên kết researchgate và cũng gửi nó vào hộp thư của bạn cùng với bài báo và giấy hội nghị trên nó: https://www.researchgate.net/publication/329306107_The_evaluation_of_a_pre-service_mathematics_teachers_TPACK_A_case_of_3D_shapes_with_GeoGebra',
            'id_comment_discussion' => 24,
            'id_user' => rand(1, 5),
            'created_at' => date("Y-m-d"),
        ]);

        DB::table('comment_detail_discussions')->insert([
            'comment_detail_discussion_content' => 'Nếu chúng ta có được sự quan tâm đầy đủ, tôi sẽ liên lạc với nhau.',
            'id_comment_discussion' => 25,
            'id_user' => rand(1, 5),
            'created_at' => date("Y-m-d"),
        ]);

        DB::table('comment_detail_discussions')->insert([
            'comment_detail_discussion_content' => 'Cảm ơn bạn',
            'id_comment_discussion' => 25,
            'id_user' => rand(1, 5),
            'created_at' => date("Y-m-d"),
        ]);

        DB::table('comment_detail_discussions')->insert([
            'comment_detail_discussion_content' => 'Cảm ơn. Bạn ở đâu và làm thế nào để tôi có thể liên lạc?',
            'id_comment_discussion' => 26,
            'id_user' => rand(1, 5),
            'created_at' => date("Y-m-d"),
        ]);

        DB::table('comment_detail_discussions')->insert([
            'comment_detail_discussion_content' => 'Làm thế nào tôi có thể liên lạc với bạn?',
            'id_comment_discussion' => 27,
            'id_user' => rand(1, 5),
            'created_at' => date("Y-m-d"),
        ]);

        DB::table('comment_detail_discussions')->insert([
            'comment_detail_discussion_content' => 'Tuyệt vời. Làm thế nào để tôi có thể liên hệ với bạn?',
            'id_comment_discussion' => 27,
            'id_user' => rand(1, 5),
            'created_at' => date("Y-m-d"),
        ]);

        DB::table('comment_detail_discussions')->insert([
            'comment_detail_discussion_content' => 'Fadeetee@gmail.com',
            'id_comment_discussion' => 27,
            'id_user' => rand(1, 5),
            'created_at' => date("Y-m-d"),
        ]);
    }
}
