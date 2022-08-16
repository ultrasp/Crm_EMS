<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$admin = Admin::where('email','admin@emc.com')->first();
        
        for ($i=0; $i < 20; $i++) { 
	        DB::table('promo_codes')->insert([
	            'rate_plan_id' => 0,
	            'code' => Str::random(5),
	            'date_end' => null,
	            'created_by' => $admin->id,
	        ]);
        }
    }
}
