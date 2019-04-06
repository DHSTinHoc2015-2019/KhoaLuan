<?php

use Illuminate\Database\Seeder;

class LibraryTableSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 20; $i++) { 
        	DB::table('libraries')->insert([
	            'id_library' => 1,
	            'file_name' => $i . '.jpg',
	            'created_at' => date("Y-m-d"),
	        ]);
        }

        for ($i=1; $i <= 20; $i++) { 
        	DB::table('libraries')->insert([
	            'id_library' => 2,
	            'file_name' => 'https://www.youtube.com/watch?v=yMQiHJsePOM',
	            'created_at' => date("Y-m-d"),
	        ]);
        }

        for ($i=1; $i <= 20; $i++) { 
            DB::table('libraries')->insert([
                'id_library' => 3,
                'file_name' => $i . '.pdf',
                'created_at' => date("Y-m-d"),
            ]);
        }
    }
}
