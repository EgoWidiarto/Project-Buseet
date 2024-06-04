<?php
require_once dirname(__FILE__) . '/midtrans-php-master/Midtrans.php';

// Set your Merchant Server Key
\Midtrans\Config::$serverKey = 'SB-Mid-server-GdjHu1CNhHP0oGZzr4U2r-rd';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;

$params = array(
    'transaction_details' => array(
        'order_id' => $_POST["orderNumber"],
        'gross_amount' => $_POST["totalPrice"],
    ),
    'customer_details' => array(
        'first_name' => $_POST["fullName"],
        'phone' => $_POST["contact"],
    ),
);


$snapToken = \Midtrans\Snap::getSnapToken($params);
echo $snapToken;