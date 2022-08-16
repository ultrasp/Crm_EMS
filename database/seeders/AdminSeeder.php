<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Адміністратор сайта',
            'email' => 'admin@emc.com',
            'password' => Hash::make('admin@emc.com'),
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ]);


    }
}
