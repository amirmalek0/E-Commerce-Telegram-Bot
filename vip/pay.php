<?php
define('VIP', TRUE);
require_once 'functions.php';
$telegram = new telegram(TOKEN, HOST, USERNAME, PASSWORD, DBNAME);
$userid = intval($_GET['uid']);
$vipid = intval($_GET['vip']);
vip_plan_info($vipid);  // returns vip plan info in 3 variables -> $plan_name - $plan_price - $plan_days
$phone = fetch_user_number($userid);

submit_order($vipid,$userid,$plan_price);  // generates $orderid
gateway_proccess($plan_price,$plan_name,$phone);

