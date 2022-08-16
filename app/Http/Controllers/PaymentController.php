<?php

namespace App\Http\Controllers;

use App\PaymentUtils\PaymentGateway;
use Illuminate\Http\Request;
use App\Models\RatePlan;
use App\Models\User;
use App\Models\Payment;
use App\Models\PromoCode;

class PaymentController extends Controller{

    // private $is_debug = true;
    // private $public_key = 'sandbox_i24006534204';
    // private $private_key = 'sandbox_TPoddlqVkIJKz132I7Dzts6q8bltpRAI1az11aRY';

	public function rate_plans(){
        return response()->json(RatePlan::getList());
    }

    public function startPayment(Request $request){
        $u = auth()->user();
        $rp = RatePlan::where('id',$request->rate_plane_id)->first();

        $promo_id = 0;
        if( $rp->has_coupon_code == 1 ){
            if(empty($request->promo_code)){
                return response()->json(['error_' => 'Промокод не може бути порожнім'],403);
            }
            $promo = PromoCode::checkIsActive($request->promo_code,$rp->id);
            if(empty($promo)){
                return response()->json(['error_' => 'Неправильний промо код'],403);

            }
            $promo_id = $promo->id;
        }

        $p = Payment::make($u->id,$rp->amount , $request->doctor_count,$rp->id,PaymentGateway::GATEWAY_LIQPAY,$rp->period_count,$promo_id);
        $p->save();

        $gatway = new PaymentGateway(PaymentGateway::GATEWAY_LIQPAY,config('payment.liqpay.public_key'),config('payment.liqpay.secret_key'),config('payment.is_debug'));
        return response()->json(['redirect_url' => $gatway->startPayment($request,$p)]);
    }


    public function subPayment(Request $request){
        $u = auth()->user();
        $rp = RatePlan::where('id',$request->rate_plane_id)->first();

        $p = Payment::make(auth()->id(),$rp->amount , count($request->users_ids),$rp->id,PaymentGateway::GATEWAY_LIQPAY,$rp->period_count);
        $p->users_id = json_encode($request->users_ids);
        $p->save();

        $gatway = new PaymentGateway(PaymentGateway::GATEWAY_LIQPAY,config('payment.liqpay.public_key'),config('payment.liqpay.secret_key'),config('payment.is_debug'));
        return response()->json(['redirect_url' => $gatway->startPayment($request,$p)]);
    }

    public function form($payment_id){
        $payment = Payment::where('id',$payment_id)->first();
        // dd($conf);
        $gateway = new PaymentGateway($payment->gateway,config('payment.liqpay.public_key'),config('payment.liqpay.secret_key'),config('payment.is_debug'));
        $form =  $gateway->getForm($payment);
        return view('payment.form',compact('form'));
    }


    public function serverCallback(Request $request){
        $log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL.
                "post data: ".(json_encode($request->input(),JSON_UNESCAPED_SLASHES)).PHP_EOL.
                "-------------------------".PHP_EOL;
        //Save string to log, use FILE_APPEND to append.
        file_put_contents('log_payment.log', $log, FILE_APPEND);

        $gatway = new PaymentGateway(PaymentGateway::GATEWAY_LIQPAY,config('payment.liqpay.public_key'),config('payment.liqpay.secret_key'),config('payment.is_debug'));
        $res = $gatway->callback($request);
        $payment = Payment::where('id',$res['payment_id'])->first();
        if( $res['status'] == PaymentGateway::STATUS_SUCCESS ){
            if($payment->status != Payment::STATUS_PAYED)
                $payment->subscribe($res['details']);
        }else{
            $payment->saveData($res['details']);
        }
    }

    public function return($id){
        $payment = Payment::where('id',$id)->first();
        return redirect( ($payment && $payment->isPayed()) ? '/thank-you' : ($payment->user->subscriber_id  == 0 ? 'first-payment' : 'worker') );
    }

    public function checkPromo(Request $request){
        $this->validate($request, [
            'code' => ['required',function ($attribute, $value, $fail) {
                $promo = PromoCode::checkIsActive($value,0);
                if(empty($promo)){
                    $fail(__('Неправильний промо код'));
                }
            }],
        ]);
        return 1;
    }
}
