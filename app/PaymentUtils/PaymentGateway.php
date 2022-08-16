<?php

namespace App\PaymentUtils;

class PaymentGateway{

	private $gateway;
	private $gatename;
	private $is_debug;

	const GATEWAY_LIQPAY = 'liqpay';

	const STATUS_SUCCESS = 1;
	const STATUS_FAIL = 0;

	function __construct($gatename = self::GATEWAY_LIQPAY,$public_key = null, $private_key = null, $is_debug = false){
		$list = self::getPaymentClassList();
		$this->gatename =$gatename; 
		$this->gateway = $list[$this->gatename]::init($public_key,$private_key,$is_debug);
	}

	public static function getPaymentClassList(){
		return [
			self::GATEWAY_LIQPAY => Gateways\LiqpayGateway::class
		];
	}

	public function startPayment($request,$payment){
		return $this->gateway->startPayment($request,$payment);
	}

    public function getForm($payment){
		return $this->gateway->getForm($payment);
    }


	public function callback($request){
		return $this->gateway->callback($request);
	}
}