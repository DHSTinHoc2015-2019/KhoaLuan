<?php

use Illuminate\Database\Seeder;

class LibraryTypeTableSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('library_types')->insert([
            'type_name' => 'Hình ảnh',
            'created_at' => date("Y-m-d"),
        ]);

        DB::table('library_types')->insert([
            'type_name' => 'Video',
            'created_at' => date("Y-m-d"),
        ]);

        DB::table('library_types')->insert([
            'type_name' => 'Văn bản',
            'created_at' => date("Y-m-d"),
        ]);
    }
}
