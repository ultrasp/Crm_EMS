<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->insert([
            'name' => 'Стоматологія',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ]);
        DB::table('specializations')->insert([
            'name' => 'Офтальмологія',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ]);

    }
}
