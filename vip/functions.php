<?php
if(!defined('VIP')) {
   die('Direct access not permitted');
}
require_once '../lib/nusoap.php';
require_once '../config.php';
require_once '../telegram.php';
require_once '../jdf.php';
$time = time();
function fa_num($input) {
    $en_nums=range(0,9);
    $fa_nums = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $output = str_replace($en_nums,$fa_nums,$input);
    return $output;
}

function vip_plan_info($vipid)
{
    global $vipid, $telegram, $plan_name, $plan_price, $plan_days;
    $sql = "select * from sp_vip_plans where id='$vipid'";
    $db = $telegram->db->query($sql);
    $result = $db->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        $plan_name = $result['name'];
        $plan_price = $result['price'];
        $plan_days = $result['days'];
    } else {
        return false;
    }
}
function fetch_user_number($userid)
{
    global $telegram;
    $sql = 'select * from sp_users where userid=' . $userid;
    $db = $telegram->db->query($sql);
    $user = $db->fetch(PDO::FETCH_ASSOC);
    $user_phone = $user['phone'];
    if (isset($user_phone) && !empty($user_phone)) {
        return $user_phone;
    } else {
        return false;
    }
}
function submit_order($vipid, $userid, $plan_price)
{
    global $telegram, $time, $orderid;
    delete_order_if_exists_before($vipid, $userid);
    $sql = "INSERT INTO `sp_orders` VALUES (NULL,'$vipid','$userid','$plan_price','','0','plan','$time')";
    $telegram->db->query($sql);
    $orderid = $telegram->db->lastInsertId();
}
function delete_order_if_exists_before($vipid, $userid)
{
    global $telegram;
    $sql = "SELECT * FROM `sp_orders` WHERE `productid`= '$vipid' AND `userid` = '$userid' AND `status`= 0 AND `type`= 'plan'";
    $db = $telegram->db->query($sql);
    $count = $db->rowCount();
    if ($count == 1) {
        $sql = "DELETE FROM `sp_orders` WHERE `productid`= '$vipid' AND `userid` = '$userid' AND `status`= 0 AND `type`= 'plan'";
        $telegram->db->query($sql);
    }

}

function gateway_proccess($plan_price,$plan_name,$phone)
{
    global $userid,$vipid,$orderid,$refid;
    $MerchantID = API;  //Required
    $Amount = $plan_price; //Amount will be based on Toman  - Required
    $Description = $plan_name;  // Required
    $Mobile = $phone; // Optional
    $CallbackURL = BASEURI . "/vip/verify.php?uid=$userid&vipid=$vipid&order=$orderid";  // Required

    $client = new nusoap_client('https://www.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
    $client->soap_defencoding = 'UTF-8';
    $result = $client->call('PaymentRequest', [
        [
            'MerchantID' => $MerchantID,
            'Amount' => $Amount,
            'Description' => $Description,
            'Mobile' => $Mobile,
            'CallbackURL' => $CallbackURL,
        ],
    ]);
    if ($result['Status'] == 100) {
        header('Location: https://www.zarinpal.com/pg/StartPay/' . $result['Authority']);
    } else {
        echo 'تراکنش با خطا مواجه شد';
    }
}
function update_vip_date($plan_name,$refid,$userid){
    global $telegram,$plan_days,$time;
    $new_vip_time = date(strtotime("+$plan_days days", $time));
    $sql = "update sp_users set vip_date='$new_vip_time',vip_plan='$plan_name',vip_refid='$refid' where userid='$userid'";
    $telegram->db->query($sql);
}
function update_orders($refid,$orderid,$plan_price,$userid){
    global $telegram;
    $sql = "update sp_orders set status=1,transcode='$refid' where id='$orderid' and price='$plan_price' and userid='$userid'";
    $telegram->db->query($sql);
}
function options($name)
{
    // Fetch buttons texts from database
    global $telegram;
    $sql = "select * from sp_options where name='$name'";
    $db = $telegram->db->query($sql);
    $option = $db->fetch();
    return $option['value'];
}
function success_msg($userid){
   global $telegram,$refid,$plan_name,$plan_price;
   $msg = options('vip_purchased_successfully');
   $msg = str_replace("[refid]", $refid, $msg);
   $msg = str_replace("[plan_name]", $plan_name, $msg);
   $msg = str_replace("[plan_price]", number_format($plan_price), $msg);
   $msg = fa_num($msg);
   $telegram->sendMessage($userid, urlencode($msg));
}
function delete_order($orderid,$plan_price,$userid){
   global $telegram;
   $telegram->db->query("DELETE FROM sp_orders where id='$orderid' and price='$plan_price' and userid='$userid' and status=0");
}
?>

<style>
     @import url('https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100;200;300;400;500;600;700;800;900&display=swap');

.succes {
   background-color: #4BB543;
}

.succes-animation {
   animation: succes-pulse 2s infinite;
}

.danger {
   background-color: #CA0B00;
}

.danger-animation {
   animation: danger-pulse 2s infinite;
}

.custom-modal {
   position: relative;
   width: 350px;
   min-height: 450px;
   background-color: #fff;
   border-radius: 30px;
   margin: 40px 10px;
}
.custom-modal-fail{
   position: relative;
   width: 350px;
   min-height: 350px;
   background-color: #fff;
   border-radius: 30px;
   margin: 40px 10px;
}

.custom-modal .content {
   position: absolute;
   width: 100%;
   text-align: center;
   bottom: 0;
}

.custom-modal .content .type {
   font-size: 18px;
   color: #999;
}

.custom-modal .content .message-type {
   font-size: 24px;
   color: #000;
}

.custom-modal .border-bottom {
   position: absolute;
   width: 300px;
   height: 20px;
   border-radius: 0 0 30px 30px;
   bottom: -20px;
   margin: 0 25px;
}

.custom-modal .icon-top {
   display: flex;
   align-items: center;
   justify-content: center;
   position: absolute;
   width: 100px;
   height: 100px;
   border-radius: 50%;
   top: 18px;
   margin: 0 125px;
   font-size: 30px;
   color: #fff;
   line-height: 100px;
   text-align: center;
}

h1 {
   border-bottom: 1px #ccc dashed;
   padding-bottom: 5px;
}
p{
   padding: 5px;
}
.no-pad{
    padding: 0;
}
.custom-modal-fail .content {
   position: absolute;
   width: 100%;
   text-align: center;
   bottom: 0;
}

.custom-modal-fail .content .type {
   font-size: 18px;
   color: #999;
}

.custom-modal-fail .content .message-type {
   font-size: 24px;
   color: #000;
}

.custom-modal-fail .border-bottom {
   position: absolute;
   width: 300px;
   height: 20px;
   border-radius: 0 0 30px 30px;
   bottom: -20px;
   margin: 0 25px;
}

.custom-modal-fail .icon-top {
   display: flex;
   align-items: center;
   justify-content: center;
   position: absolute;
   width: 100px;
   height: 100px;
   border-radius: 50%;
   top: 18px;
   margin: 0 125px;
   font-size: 30px;
   color: #fff;
   line-height: 100px;
   text-align: center;
}

@keyframes succes-pulse {
   0% {
       box-shadow: 0px 0px 30px 20px rgba(75, 181, 67, .2);
   }

   50% {
       box-shadow: 0px 0px 30px 20px rgba(75, 181, 67, .4);
   }

   100% {
       box-shadow: 0px 0px 30px 20px rgba(75, 181, 67, .2);
   }
}

@keyframes danger-pulse {
   0% {
       box-shadow: 0px 0px 30px 20px rgba(202, 11, 0, .2);
   }

   50% {
       box-shadow: 0px 0px 30px 20px rgba(202, 11, 0, .4);
   }

   100% {
       box-shadow: 0px 0px 30px 20px rgba(202, 11, 0, .2);
   }
}


.page-wrapper {
   height: 100%;
   background-color: #eee;
   display: flex;
   align-items: center;
   justify-content: center;
}

.tel-btn {
   background-color: #229ED9;
   color: #fff;
   width: 50%;
   margin: auto;
   border-radius: 10px;
   padding: 8px;
   text-decoration: none;

}

.tel-btn a {
   color: #fff;
   text-decoration: none;
}

.btn {
   margin: 15px;
}

.btn a {
   text-decoration: none;
}
.v-align{
   vertical-align: middle;
}
body {
   margin: 0;
   font-family: 'Vazirmatn', sans-serif;
}

@media only screen and (max-width: 800px) {
   .page-wrapper {
       flex-direction: column;
   }
}
</style>