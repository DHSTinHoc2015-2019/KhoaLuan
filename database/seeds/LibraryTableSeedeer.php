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
        $faker = Faker\Factory::create();
        for ($i=1; $i <= 20; $i++) { 
        	DB::table('libraries')->insert([
	            'id_library' => 1,
                'title' => $faker->realText(50),
	            'file_name' => $i . '.jpg',
                'id_user' => rand(1, 4),
	            'created_at' => date("Y-m-d"),
	        ]);
        }

        for ($i=1; $i <= 20; $i++) { 
        	DB::table('libraries')->insert([
	            'id_library' => 2,
                'title' => $faker->realText(50),
	            'file_name' => 'https://www.youtube.com/watch?v=yMQiHJsePOM',
                'id_user' => rand(1, 4),
	            'created_at' => date("Y-m-d"),
	        ]);
        }

        for ($i=1; $i <= 20; $i++) { 
            DB::table('libraries')->insert([
                'id_library' => 3,
                'title' => $faker->realText(50),
                'id_user' => rand(1, 4),
                'file_name' => $i . '.pdf',
                'created_at' => date("Y-m-d"),
            ]);
        }
    }
}
