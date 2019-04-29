<?php

use Illuminate\Database\Seeder;

class LinkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
    	DB::table('links')->insert([
            'name' => 'Tpack',
            'link' => 'http://tpack.org/',
            'created_at' => date("Y-m-d"),
        ]);
        DB::table('links')->insert([
            'name' => 'Group Facebook',
            'link' => 'https://www.facebook.com/groups/47147628001/',
            'created_at' => date("Y-m-d"),
        ]);
        DB::table('links')->insert([
            'name' => 'Learntechlib',
            'link' => 'https://www.learntechlib.org',
            'created_at' => date("Y-m-d"),
        ]);
        DB::table('links')->insert([
            'name' => 'Quickshout',
            'link' => 'https://quickshout.blogspot.com',
            'created_at' => date("Y-m-d"),
        ]);
    }
}
