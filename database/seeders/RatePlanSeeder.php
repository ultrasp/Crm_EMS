<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;
use App\Models\RatePlan;
use Illuminate\Support\Facades\DB;

class RatePlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$cur = Currency::where('iso_code','UAH')->first();
        
        DB::table('rate_plans')->insert([
            'currency_id' => $cur->id,
            'name' => '7днів',
            'amount' => 1,
            'period_count' => 7,
            'period_type' => RatePlan::PERIOD_TYPE_DAY,
            'has_coupon_code' => 0,
            'description'=>'Вартість за 4 лікарів на рік'
        ]);

        DB::table('rate_plans')->insert([
            'currency_id' => $cur->id,
            'name' => 'місяць',
            'amount' => 200,
            'period_count' => 28,
            'period_type' => RatePlan::PERIOD_TYPE_DAY,
            'has_coupon_code' => 0,
            'description'=>'Вартість за 4 лікарів на місяць'
        ]);

        DB::table('rate_plans')->insert([
            'currency_id' => $cur->id,
            'name' => 'рік',
            'amount' => 1000,
            'period_count' => 365,
            'period_type' => RatePlan::PERIOD_TYPE_DAY,
            'has_coupon_code' => 0,
            'description'=>'Вартість за 4 лікарів на рік'
        ]);

        DB::table('rate_plans')->insert([
            'currency_id' => $cur->id,
            'name' => '14днів',
            'amount' => 1,
            'period_count' => 14,
            'period_type' => RatePlan::PERIOD_TYPE_DAY,
            'has_coupon_code' => 1,
            'description' => 'Вартість за 4 лікарів на рік'
        ]);
        //
    }
}
