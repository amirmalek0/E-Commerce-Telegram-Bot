<?php
define('PURCHASE', TRUE);
require_once 'functions.php';
$telegram = new telegram(TOKEN, HOST, USERNAME, PASSWORD, DBNAME);
$userid = intval($_GET['uid']);
$product_id = intval($_GET['product']);

submit_order($product_id, $userid);
gateway_proccess($name, $price, $orderid);

