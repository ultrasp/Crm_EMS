<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\RatePlan;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $rp = RatePlan::where('id',2)->first();

        DB::table('payments')->insert([
            'user_id' => '1',
            'price' => $rp->amount,
            'doctor_count' => 6,
            'rate_plan_id' => $rp->id,
            'status' => Payment::STATUS_INIT,
            'gateway' => 'liqpay',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ]);
        $p = Payment::first();
        $p->subscribe(json_encode(['info'=>'test']));
    
    }
}
