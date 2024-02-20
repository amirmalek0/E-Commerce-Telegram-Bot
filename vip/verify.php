<?php
define('VIP', TRUE);
require_once 'functions.php';
$telegram = new telegram(TOKEN, HOST, USERNAME, PASSWORD, DBNAME);
$userid = intval($_GET['uid']);
$vipid = intval($_GET['vipid']);
$orderid = intval($_GET['order']);
vip_plan_info($vipid);  // returns vip plan info in 3 variables -> $plan_name - $plan_price - $plan_days


$MerchantID = API;
$Amount = $plan_price; //Amount will be based on Toman
$Authority = $_GET['Authority'];


if ($_GET['Status'] == 'OK') {
    $client = new nusoap_client('https://www.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
    $client->soap_defencoding = 'UTF-8';
    $result = $client->call('PaymentVerification', [
        [
            'MerchantID' => $MerchantID,
            'Authority'  => $Authority,
            'Amount' => $Amount,
        ],
    ]);

    if ($result['Status'] == 100) {
        $refid = $result['RefID'];
        include 'success.php';
        update_vip_date($plan_name,$refid,$userid);
        update_orders($refid,$orderid,$plan_price,$userid);
        success_msg($userid);
    } else {
        include 'fail.php';
        delete_order($orderid,$plan_price,$userid);
    }
} else {
    include 'canceled.php';
    delete_order($orderid,$plan_price,$userid);
}
