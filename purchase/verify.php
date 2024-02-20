<?php
define('PURCHASE', TRUE);
require_once 'functions.php';
$telegram = new telegram(TOKEN, HOST, USERNAME, PASSWORD, DBNAME);
$orderid = intval($_GET['order']);




if ($_GET['Status'] == 'OK') {
    select_order($orderid);  // price,userid,productid
    select_product($productid);  // name,fileurl
    $MerchantID = API;
    $Amount = $price; //Amount will be based on Toman
    $Authority = $_GET['Authority'];
    
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
        update_orders($refid, $orderid, $price, $userid);
        send_file($userid, $fileurl);
    } else {
        include 'fail.php';
        delete_order($orderid);
    }
} else {
    include 'canceled.php';
    delete_order($orderid);
}
