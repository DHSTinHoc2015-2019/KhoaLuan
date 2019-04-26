<?php

use Illuminate\Database\Seeder;

class DiscussionTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discussion_types')->insert([
            'name_discussion_type' => 'Kiến thức về nội dung chuyên môn (CK)',
            'created_at' => date("Y-m-d"),
        ]);
        DB::table('discussion_types')->insert([
            'name_discussion_type' => 'Kiến thức phương pháp sư phạm (PK)',
            'created_at' => date("Y-m-d"),
        ]);
        DB::table('discussion_types')->insert([
            'name_discussion_type' => 'Kiến thức công nghệ (TK)',
            'created_at' => date("Y-m-d"),
        ]);
        DB::table('discussion_types')->insert([
            'name_discussion_type' => 'Kiến thức nội dung phương pháp (PCK)',
            'created_at' => date("Y-m-d"),
        ]);
        DB::table('discussion_types')->insert([
            'name_discussion_type' => 'Kiến thức nội dung công nghệ (TCK)',
            'created_at' => date("Y-m-d"),
        ]);
        DB::table('discussion_types')->insert([
            'name_discussion_type' => 'Kiến thức phương pháp công nghệ (TPK)',
            'created_at' => date("Y-m-d"),
        ]);
    }
}
