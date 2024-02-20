<?php
define('INDEX', TRUE);
include_once 'config.php';
include_once 'jdf.php';
include_once 'telegram.php';
include_once 'initial.php';
include_once 'btns.php';


// CallBack queries
inline_close_btn();
back_to_cats();
most_popular_products();
latest_products();
show_selected_category_products();
show_product();
download_file();
get_phone();
send_product_by_id();
submit_ticket();
submit_search();


// BOT START 
if ($text == '/start') {
    if (is_verified($userid)) {
        $msg = $welcome_msg;
        $telegram->sendMessageCURL($userid, $msg, $main_keyboard);
    } else {
        request_phone();
    }
}
// BACK TO HOME
if ($text == $home) {
    if (is_verified($userid)) {
        $msg = $main_menu_msg;
        $telegram->sendMessageCURL($userid, $msg, $main_keyboard);
    } else {
        request_phone();
    }
}

// ENTER THE SHOP
if ($text == $shop) {
    if (is_verified($userid)) {
        show_categories_list();
    } else {
        request_phone();
    }
}

// Check Vip
if ($text == $vip_member) {
    if (is_verified($userid)) {
        vip();
    } else {
        request_phone();
    }
}

// User's transactions history
if($text == $my_transactions){
    if (is_verified($userid)) {
        user_purchased_products($userid);
    } else {
        request_phone();
    }
}

// Ticket and support
if($text == $send_ticket){
    if (is_verified($userid)) {
      ticket();
    } else {
        request_phone();
    }
}

// Search in products
if($text == $search_products){
    if (is_verified($userid)) {
        init_search();
    } else {
        request_phone();
    }
}

// User's profile information
if($text == $account){
    if(is_verified($userid)){
        account_info();
    }else{
        request_phone();
    }
}

