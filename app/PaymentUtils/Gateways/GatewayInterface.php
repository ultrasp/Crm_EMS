<?php
namespace App\PaymentUtils\Gateways;

interface GatewayInterface
{
	public static function init($public_key,$private_key,$is_debug);
    public function startPayment($request,$payment);
    public function getForm($payment);
    public function callback($request);
}
