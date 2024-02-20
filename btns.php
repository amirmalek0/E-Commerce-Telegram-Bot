<?php
if(!defined('INDEX')) {
    die('Direct access not permitted');
 }

$home = options('home');
$shop = options('shop');
$vip_member = options('vip_member');
$my_transactions = options('my_transactions');
$send_ticket = options('send_ticket');
$phone_verefication = options('phone_verefication');
$welcome_msg = options('welcome_msg');
$main_menu_msg = options('main_menu_msg');
$requst_phone_msg =options('requst_phone_msg');
$phone_verified = options('phone_verified');
$phone_cheating = options('phone_cheating');
$wrong_format = options('wrong_format');
$cats_msg = options('cats_msg');
$empty_cat = options('empty_cat');
$products_list_waiting = options('products_list_waiting');
$choose_product = options('choose_product');
$product_info_waiting = options('product_info_waiting');
$free_msg = options('free_msg');
$vip_msg = options('vip_msg');
$dl_btn = options('dl_btn');
$pay_btn = options('pay_btn');
$demo_btn = options('demo_btn');
$allowed_vip_msg = options('allowed_vip_msg');
$sending_file = options('sending_file');
$vip_plans = options('vip_plans');
$already_purchased_product = options('already_purchased_product');
$empty_transactions = options('empty_transactions');
$ticket_msg = options('ticket_msg');
$ticket_sent = options('ticket_sent');
$new_ticket = options('new_ticket');
$search_products = options('search_products');
$no_search_result = options('no_search_result');
$search_description = options('search_description');
$empty_cats = options('empty_cats');
$account = options('account');
$no_popular_product = options('no_popular_product');
$phone_not_verified = options('phone_not_verified');
$no_vip_plan = options('no_vip_plan');
$search_text = options('search_text');
$cat_list_waiting = options('cat_list_waiting');
$back_to_cats = options('back_to_cats');
$popular_products = options('popular_products');
$popular_products_text = options('popular_products_text');
$latest_products = options('latest_products');
$latest_products_text = options('latest_products_text');
$no_latest_product = options('no_latest_product');
$exit = options('exit');
$ad= options('ad');
$ad_link = options('ad_link');

$populars_count = 7; // تعداد نمایش محصولات محبوب(براساس ویو هر محصول)
$latests_count = 7; // تعداد نمایش آخرین محصولات
$cat_column_number = 2; // مدل نمایش دسته بندی ها (2 = در هر ردیف دو دسته بندی)
$products_column_number = 1; // مدل نمایش محصولات (1 = در هر ردیف یک محصول)


$main_keyboard = array(
    array($shop, $vip_member),
    array($my_transactions, $account),
    array($search_products),
    array($send_ticket)
);
$phone_send_keyboard = array(
    array(array('text' => $phone_verefication, 'request_contact' => true)),
);
$go_to_home_keyboard = array(
    array($home),
);
