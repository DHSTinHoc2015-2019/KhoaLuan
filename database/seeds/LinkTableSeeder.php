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
        for ($i=0; $i < 6; $i++) { 
        	DB::table('links')->insert([
	            'name' => 'Tpack',
	            'link' => 'http://tpack.org/',
	            'created_at' => date("Y-m-d"),
	        ]);
        }
    }
}
