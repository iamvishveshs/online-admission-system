<?php

require('config.php');
require('./db.php');
session_start();

require('./Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    $html = "<p>Your payment was successful</p>
    <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
    $applicant_id=$_SESSION['id'];
    $payment_id=$_POST['razorpay_payment_id'];
    $order_id=$_SESSION['razorpay_order_id'];
    date_default_timezone_set("Asia/Calcutta");
    $amount=$_SESSION['amount'];
    $sql="INSERT INTO `fees_details`(`applicant_id`, `payment_id`, `order_id`, `date_of_ payment`, `amount`, `status`) VALUES ('$applicant_id','$payment_id','$order_id',CURRENT_TIMESTAMP(),'$amount','successful')";
    $result=mysqli_query($conn,$sql);
    if (isset($result)) {
        $update_Status="UPDATE `application_status` SET `status`='success',`date`=CURRENT_TIMESTAMP() WHERE `user_id`='$applicant_id'";
        $Status_result=mysqli_query($conn,$update_Status);
        if (isset($Status_result))
        {
            header("Location:success.php");
        }
    }
    else
    {
        echo "error while submitting to database";
    }
}
else
{
    $html = "<p>Your payment failed</p>
    <p>{$error}</p>";
}

echo $html;
