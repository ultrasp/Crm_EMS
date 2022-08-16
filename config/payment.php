<?php

return [

    'is_debug' => env('IS_DEBUG_PAYMENT', true),
    'liqpay' => [
        'secret_key' => env('LIQPAY_SECRET_KEY') ,
        'public_key' => env('LIQPAY_PUBLIC_KEY') 
    ]
];
