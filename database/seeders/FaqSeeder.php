<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = \Faker\Factory::create("uk_UA");
		// $faker->addProvider(new \Faker\Provider\uk_UA\Lorem($faker));
        for ($i=0; $i < 20; $i++) { 
	        DB::table('faqs')->insert([
		        'title' => $faker->sentence,
		        'description' => $faker->paragraph,
	            'created_at' => date('Y-m-d'),
	            'updated_at' => date('Y-m-d'),
	        ]);
        }
        //
    }
}
