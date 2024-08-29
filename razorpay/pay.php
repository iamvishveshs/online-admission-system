<?php

require('./config.php');
require('./Razorpay.php');
session_start();

// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$name=$_POST['name'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$amount=$_POST['fees'];
$_SESSION['name']=$name;
$_SESSION['mobile']=$mobile;
$_SESSION['email']=$email;
$_SESSION['amount']=$amount;


$orderData = [
    'receipt'         => "3456",
    'amount'          => $amount * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$checkout = 'manual';

if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
{
    $checkout = $_GET['checkout'];
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => "OAS",
    "description"       => "Application fees",
    "image"             => "https://cdn.razorpay.com/logos/K2Fn7Rn6XZP6k4_medium.png",
    "prefill"           => [
    "name"              => $name,
    "email"             => $email,
    "contact"           => $mobile,
    ],
    "notes"             => [
    "address"           => "Hello World",
    "merchant_order_id" => "your razorpay merchant id",
    ],
    "theme"             => [
    "color"             => "#528FF0"
    ],
    "modal"             => [
    "escape"            => false,
    "handleback"        => false,
    "confirm_close"     => true
    ],
    "send_sms_hash"     => true,
    
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);

require("checkout/{$checkout}.php");
