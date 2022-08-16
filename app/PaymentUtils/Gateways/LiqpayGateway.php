<?php
namespace App\PaymentUtils\Gateways;

use App\PaymentUtils\Sdk\LiqPay;
use App\Models\Payment;

class LiqpayGateway implements GatewayInterface{

    private $liqpay;
    private $is_debug;
    protected $public_key;
    protected $private_key;

    public static function init($public_key,$private_key,$is_debug){
        $item = new self();
        $item->public_key =$public_key; 
        $item->private_key =$private_key; 
        $item->liqpay = new LiqPay($public_key, $private_key);
        $item->is_debug = $is_debug;
        return $item;
    }

    public function startPayment($request,$payment){
        return route('payment.form',['id' => $payment->id]);
    }

    public function getForm($payment){
        $data = [
            'version'           => '3',
            'action'            => 'pay',
            'amount'            => $payment->price * $payment->doctor_count, // сумма заказа
            'currency'          => $payment->rateplan->currency->iso_code,//'UAH',
            /* перед этим мы ведь внесли заказ в  таблицу, 
            $insert_id = $wpdb->query( 'insert into table_orders' );
            */
            'description'    => 'Оплата заказа № '.$payment->id, 
            'order_id'       => $payment->id,
            // если пользователь возжелает вернуться на сайт
            'result_url'    =>  route('payment.return',['id'=>$payment->id]),
            /*
                если не вернулся, то Webhook LiqPay скинет нам сюда информацию из формы,
                в частонсти все тот же order_id, чтобы заказ
                 можно было обработать как оплаченый
            */
            'server_url'    =>  route('payment.callback'),
            'language'      =>  'uk', // uk, en
        ];
        if($this->is_debug){
            $data['sandbox'] = '1';
        }
        // dd($data);
        return $this->liqpay->cnb_form($data);
	}

    public function callback($request){
        if( $request->has('data') ){
            $data = $request->data;
            $server_sign = $request->signature;

            $sign = base64_encode( sha1( $this->private_key .  $data . $this->private_key , 1 ));

            if($server_sign == $sign){
                $result = json_decode( base64_decode($data) );
                if( (!$this->is_debug && $result->status == 'success') || ($this->is_debug && $result->status == 'sandbox') ){
                    $status = \App\PaymentUtils\PaymentGateway::STATUS_SUCCESS;
                }else{
                    $status = \App\PaymentUtils\PaymentGateway::STATUS_FAIL;
                }
                return [
                    'payment_id' => $result->order_id,
                    'status' => $status,
                    'details' => $data
                ];
            }

        }

    }
}