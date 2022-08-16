<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'stomatolog_test',
            'email' => 'sanya.povoroznyuk@gmail.com',
            'password' => Hash::make('sanya.povoroznyuk@gmail.com'),
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
            'surname' => 'Oleksandr',
            'nickname' => 'Oleksandr',
            'phone' => '+0508465691',
            'specialization' => 1,
            'status' => User::STATUS_NOT_ACTIVATED
        ]);

        DB::table('users')->insert([
            'name' => 'oftalmolog_test',
            'email' => 'sanya.povoroznyuk+1@gmail.com',
            'password' => Hash::make('test'),
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
            'surname' => 'oftalmolog_test',
            'nickname' => 'oftalmolog_test',
            'phone' => '+0508465691',
            'specialization' => 2,
            'status' => User::STATUS_ACTIVATED
        ]);
        //
    }
}
