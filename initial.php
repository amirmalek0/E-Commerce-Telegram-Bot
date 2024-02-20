<?php

$telegram = new telegram(TOKEN, HOST, USERNAME, PASSWORD, DBNAME);
$result = $telegram->getTxt();

// user initializing
$baseuri = BASEURI;
$userid = $result->message->from->id;
$text = $result->message->text;
$fname = $result->message->from->first_name;
$lname = $result->message->from->last_name;
$username = $result->message->from->username;
$date = jdate('Y/m/d');
$contact = $result->message->contact->phone_number;
$contact = str_replace('+', "", $contact);
$msgid = $result->message->message_id;
$time = time();
$fileid = $result->message->document->file_id;



// callbacks
$cid = $result->callback_query->id;
$cdata = $result->callback_query->data;
$cmsgid = $result->callback_query->message->message_id;
$cuserid = $result->callback_query->from->id;



// upload file
if ($result->message->document->file_id) {
    $fileid = $result->message->document->file_id;
} elseif ($result->message->audio->file_id) {
    $fileid = $result->message->audio->file_id;
} elseif ($result->message->video->file_id) {
    $fileid = $result->message->video->file_id;
} elseif ($result->message->photo[0]->file_id) {
    $fileid = $result->message->photo->file_id;
    if (isset($result->message->photo[2]->file_id)) {
        $fileid = $result->message->photo[2]->file_id;
    } elseif ($fileid = $result->message->photo[1]->file_id) {
        $fileid = $result->message->photo[1]->file_id;
    } else {
        $fileid = $result->message->photo[1]->file_id;
    }
} elseif ($result->message->voice->file_id) {
    $fileid = $result->message->voice->file_id;
}
$msgid = $result->message->message_id;

if ($userid == $admin and $fileid) {
    bot('sendmessage', [
        'chat_id' => $userid,
        'text' => "$fileid",
        'reply_to_message_id' => $msgid
    ]);
}

function fa_num($input)
{
    $en_nums = range(0, 9);
    $fa_nums = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $output = str_replace($en_nums, $fa_nums, $input);
    return $output;
}

function options($name)
{
    // Fetch buttons texts from database
    global $telegram;
    $sql = "select * from sp_options where name='$name'";
    $db = $telegram->db->query($sql);
    $option = $db->fetch();
    return trim($option['value']);
}


function numeric_id()
{
    // Creates a new file by the name of user's id in /users directory
    global $userid;
    $usernumericid = 'users/' . $userid . '.txt';
    if (!file_exists($usernumericid)) {
        $userfile = fopen('users/' . $userid . '.txt', "w");
        fclose($userfile);
    }
}
function check_new_user()
{
    // If new User detected, insert his/her data to sp_users table
    global $userid, $telegram, $fname, $lname, $username;
    $sql = "select * from sp_users where userid=" . $userid;
    $db = $telegram->db->query($sql);
    $count = $db->rowCount();
    if ($count == 0) {
        numeric_id();
        $sql = "INSERT INTO sp_users (id,userid,name,username,phone,vip_date,vip_plan,vip_refid,verified) VALUES (NULL,'$userid','$fname.$lname','$username',0,0,0,0,0)";
        $telegram->db->query($sql);
    }
}

function get_phone()
{
    // Receives phone number if user sends it
    global $contact, $phone_verified, $telegram, $userid, $go_to_home_keyboard;
    if (isset($contact)) {
        if (validate_phone()) {
            update_number();
            $msg = $phone_verified;
            $telegram->sendMessageCURL($userid, $msg, $go_to_home_keyboard);
        }
    }
}
function update_number()
{
    // Insert user's phone number to database 
    global $contact, $userid, $telegram;
    $contact = str_replace('98', "0", $contact);
    $sql = "UPDATE sp_users SET phone = '$contact', verified = '1' WHERE sp_users.userid = '$userid'";
    $telegram->db->query($sql);
}

function is_vip($userid)
{
    // Check if User is VIP or not - If user is vip returns remaining days 
    global $userid, $telegram, $time, $vip_days, $day;
    $sql = "select * from sp_users WHERE userid='$userid'";
    $db = $telegram->db->query($sql);
    $user = $db->fetch(PDO::FETCH_ASSOC);
    $vip_date = $user['vip_date'];
    $now = date($time);
    $day = $vip_date - $now;
    if ($day > 0) {
        $vip_days = number_format($day / 60 / 60 / 24);
        return true;
    } else {
        return false;
    }
}


function is_verified($userid)
{
    // Check if user's Phone is Verified or Not
    check_new_user();
    global $telegram;
    global $verified;
    $sql = "select * from sp_users WHERE userid='$userid'";
    $db = $telegram->db->query($sql);
    $user = $db->fetch(PDO::FETCH_ASSOC);
    $verified = $user['verified'];
    if ($verified == 0) {
        return false;
    } elseif ($verified == 1) {
        return true;
    } else {
        return false;
    }
}
function request_phone()
{
    global $requst_phone_msg, $telegram, $userid, $phone_send_keyboard;
    $msg = $requst_phone_msg;
    $telegram->sendMessageCURL($userid, $msg, $phone_send_keyboard);
}

function validate_phone()
{
    // check if the phone number is owned by sender or not. Prevents cheating (Share Contact);
    // check if the number is Iranian Number or not (Only +98 (country code) is accepted);
    global $result, $contact, $phone_cheating, $telegram, $userid, $wrong_format, $phone_send_keyboard;
    if (isset($contact)) {
        if (isset($result->message->contact)) {
            if (isset($result->message->contact->user_id) && $result->message->contact->user_id == $result->message->from->id)
                if (preg_match("/^[98]\d{11}$/", $contact)) {
                    return true;
                } else {
                    $msg = $wrong_format;
                    $telegram->sendMessageCURL($userid, $msg, $phone_send_keyboard);
                    exit;
                }
            else
                $msg = $phone_cheating;
            $telegram->sendMessageCURL($userid, $msg, $phone_send_keyboard);
        }
    }
}

function inline_close_btn()
{
    global $userid, $telegram, $cdata;
    if (preg_match('/exit/', $cdata)) {
        $input = explode('#', $cdata);
        $msgid = $input[1];
        $userid = $input[2];
        $msgid = $msgid + 1;
        $telegram->deleteMessage($userid, $msgid);
    }
    if (preg_match('/close/', $cdata)) {
        $input = explode('#', $cdata);
        $msgid = $input[1];
        $userid = $input[2];
        $telegram->deleteMessage($userid, $msgid);
    }
}
function show_categories_list()
{
    // Fetch All categories and returns user's selection by callback data
    global $telegram, $userid, $cats_msg, $cat_column_number, $empty_cats, $main_keyboard, $popular_products, $latest_products, $msgid, $exit;
    $sql = "select * from sp_cats";
    $db = $telegram->db->query($sql);
    $categories = $db->fetchAll();
    if (empty($categories)) {
        $telegram->sendMessageCURL($userid, $empty_cats, $main_keyboard);
    } else {
        $keyboard = [];
        foreach ($categories as $cat) {
            $id = $cat['id'];
            $name = $cat['name'];
            $keyboard[] = ['text' => "$name", 'callback_data' => "cat#$id"];
        }
        $keyboard = array_chunk($keyboard, $cat_column_number);
        $populars = [['text' => $popular_products, 'callback_data' => "populars"]];
        $latests = [['text' => $latest_products, 'callback_data' => "latests"]];
        $exit = [['text' => $exit, 'callback_data' => "exit#$msgid#$userid"]];

        array_push($keyboard, $populars);
        array_push($keyboard, $latests);
        array_push($keyboard, $exit);

        bot('sendmessage', [
            'chat_id' => $userid,
            'text' => $cats_msg,
            'reply_markup' => json_encode(['inline_keyboard' => $keyboard])
        ]);
    }
}



function show_selected_category_products()
{
    pagination();
    global $telegram, $cdata, $cid, $empty_cat, $products_list_waiting, $cuserid, $cmsgid, $choose_product, $products_column_number, $pages, $back_to_cats;
    if (preg_match('/cat/', $cdata)) {
        $input = explode('#', $cdata);
        $cat_id = $input[1];
        $sql = "select * from sp_files WHERE catid='$cat_id' and status=1 ORDER BY id DESC LIMIT 5";
        $db = $telegram->db->query($sql);
        $products = $db->fetchAll();



        if (empty($products)) {
            bot('answercallbackquery', [
                'callback_query_id' => $cid,
                'text' => $empty_cat,
                'show_alert' => false
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $cid,
                'text' => $products_list_waiting,
                'show_alert' => false
            ]);
            $keyboard = [];
            foreach ($products as $product) {
                $id = $product['id'];
                $name = $product['name'];
                $name = fa_num($name);
                $keyboard[] = ['text' => "$name", 'callback_data' => "file#$id"];
            }

            $sql2 = "select * from sp_files WHERE catid='$cat_id' and status=1";
            $db2 = $telegram->db->query($sql2);
            $products2 = $db2->fetchAll();

            $page = 1;
            $count = count($products2);
            $pages = ceil($count / 5);
            if ($pages <= 1) {
                $pagination = [];
            } else {
                $pagination = [];
                while ($page <= $pages) {
                    $pagenumber = ['text' => fa_num($page), 'callback_data' => "page#$page#$cat_id"];
                    array_push($pagination, $pagenumber);
                    $page++;
                }
            }

            $keyboard = array_chunk($keyboard, 1);
            $pagination_keyboard = array(
                $pagination
            );
            $keyboar_with_pagination = array_merge($keyboard, $pagination_keyboard);

            $back_to_cats = [['text' => $back_to_cats, 'callback_data' => "back_to_cats"]];
            array_push($keyboar_with_pagination, $back_to_cats);
            bot('editMessageText', [
                'chat_id' => $cuserid,
                'message_id' => $cmsgid,
                'parse_mode' => "HTML",
                'text' => $choose_product,
                'reply_markup' => json_encode([
                    'inline_keyboard' => $keyboar_with_pagination
                ])
            ]);
        }
    }
}

function pagination()
{
    global $telegram, $cdata, $cid, $empty_cat, $products_list_waiting, $pages, $products_column_number, $cuserid, $cmsgid, $choose_product, $main_keyboard, $back_to_cats;
    if (preg_match('/page/', $cdata)) {
        $input = explode('#', $cdata);
        $current_page = $input[1];
        $cat_id = $input[2];
        $product_per_page = 5;
        $offset = ($current_page - 1) * $product_per_page;
        $sql = "select * from sp_files WHERE catid='$cat_id' and status=1 ORDER BY id DESC LIMIT 5 OFFSET $offset";
        $db = $telegram->db->query($sql);
        $products = $db->fetchAll();


        $keyboard = [];
        foreach ($products as $product) {
            $id = $product['id'];
            $name = $product['name'];
            $name = fa_num($name);
            $keyboard[] = ['text' => "$name", 'callback_data' => "file#$id"];
        }

        $sql2 = "select * from sp_files WHERE catid='$cat_id' and status=1";
        $db2 = $telegram->db->query($sql2);
        $products2 = $db2->fetchAll();

        $page = 1;
        $count = count($products2);
        $pages = ceil($count / 5);

        $pagination = [];
        while ($page <= $pages) {
            if ($current_page == $page) {
                $pagenumber = ['text' => "✅ " . fa_num($page), 'callback_data' => "page#$page#$cat_id"];
            } else {
                $pagenumber = ['text' => fa_num($page), 'callback_data' => "page#$page#$cat_id"];
            }
            array_push($pagination, $pagenumber);
            $page++;
        }


        $keyboard = array_chunk($keyboard, 1);
        $pagination_keyboard = array(
            $pagination
        );
        $keyboar_with_pagination = array_merge($keyboard, $pagination_keyboard);

        $back_to_cats = [['text' => $back_to_cats, 'callback_data' => "back_to_cats"]];
        array_push($keyboar_with_pagination, $back_to_cats);
        bot('editMessageText', [
            'chat_id' => $cuserid,
            'message_id' => $cmsgid,
            'parse_mode' => "HTML",
            'text' => $choose_product,
            'reply_markup' => json_encode([
                'inline_keyboard' => $keyboar_with_pagination
            ])
        ]);
    }
}


function product_keyboard($userid)
{
    global $type, $free_msg, $dl_btn, $demo_btn, $demo, $back_to_cats, $telegram, $time, $id, $already_purchased_product, $day, $allowed_vip_msg, $vip_msg, $pay_btn, $baseuri, $footer_msg, $keyboard, $views, $ad, $ad_link;
    //check if is_vip or not ;
    $sql = "select * from sp_users WHERE userid='$userid'";
    $db = $telegram->db->query($sql);
    $user = $db->fetch(PDO::FETCH_ASSOC);
    $vip_date = $user['vip_date'];
    $now = date($time);
    $day = $vip_date - $now;
    //check if is_vip or not ;

    if ($type == 'free') {
        $footer_msg = $free_msg;
        $keyboard = [[['text' => $dl_btn, 'callback_data' => "download#$id"]]];
    } elseif ($type == 'vip') {
        if (already_purchased($userid, $id)) {
            $footer_msg = $already_purchased_product;
            $keyboard = [[['text' => $dl_btn, 'callback_data' => "download#$id"]]];
        } elseif ($day > 0) {
            $footer_msg = $allowed_vip_msg;
            $keyboard = [[['text' => $dl_btn, 'callback_data' => "download#$id"]]];
        } else {
            $footer_msg = $vip_msg;
            $keyboard = [[['text' => $pay_btn, 'url' => $baseuri . "/purchase/pay.php?uid=$userid&product=$id"]]];
        }
    }
    if (isset($demo) && !empty($demo)) {
        $demo = [['text' => $demo_btn, 'url' => $demo]];
        array_push($keyboard, $demo);
    }


    $back_to_cats_views = [['text' => $back_to_cats, 'callback_data' => "back_to_cats"], ['text' => 'تعداد بازدید: ' . fa_num($views), 'callback_data' => "views"]];
    array_push($keyboard, $back_to_cats_views);
    // if (isset($ad) && !empty($ad)) {
    //     $ads = [['text' => $ad, 'url' => $ad_link]];
    //     array_push($keyboard, $ads);
    // }
}
function back_to_cats()
{
    global $telegram, $exit, $msgid, $userid, $cats_msg, $cat_list_waiting, $cat_column_number, $empty_cats, $cid, $popular_products, $main_keyboard, $cdata, $cuserid, $cmsgid, $latest_products;
    if (preg_match('/back_to_cats/', $cdata)) {
        $sql = "select * from sp_cats";
        $db = $telegram->db->query($sql);
        $categories = $db->fetchAll();
        bot('answercallbackquery', [
            'callback_query_id' => $cid,
            'text' => $cat_list_waiting,
            'show_alert' => false
        ]);
        if (empty($categories)) {
            $telegram->sendMessageCURL($cuserid, $empty_cats, $main_keyboard);
        } else {
            $keyboard = [];
            foreach ($categories as $cat) {
                $id = $cat['id'];
                $name = $cat['name'];
                $keyboard[] = ['text' => "$name", 'callback_data' => "cat#$id"];
            }
            $keyboard = array_chunk($keyboard, $cat_column_number);
            $populars = [['text' => $popular_products, 'callback_data' => "populars"]];
            $latests = [['text' => $latest_products, 'callback_data' => "latests"]];
            $exit = [['text' => $exit, 'callback_data' => "close#$cmsgid#$cuserid"]];

            array_push($keyboard, $populars);
            array_push($keyboard, $latests);
            array_push($keyboard, $exit);

            bot('editMessageText', [
                'chat_id' => $cuserid,
                'text' => $cats_msg,
                'message_id' => $cmsgid,
                'parse_mode' => "HTML",
                'reply_markup' => json_encode(['inline_keyboard' => $keyboard])
            ]);
        }
    }
}
function show_product()
{
    global $footer_msg, $keyboard, $id, $cdata, $cid, $product_info_waiting, $cuserid, $cmsgid, $name, $desc, $price;
    if (preg_match('/file/', $cdata)) {

        bot('answercallbackquery', [
            'callback_query_id' => $cid,
            'text' => $product_info_waiting,
            'show_alert' => false
        ]);
        $input = explode('#', $cdata);
        $id = $input[1];
        product_info($id);
        product_keyboard($cuserid);



        $msg = options('product_info');
        $msg = str_replace("[name]", $name, $msg);
        $msg = str_replace("[desc]", $desc, $msg);
        $msg = str_replace("[price]", $price, $msg);
        $msg = str_replace("[footer_msg]", $footer_msg, $msg);
        $msg = fa_num($msg);


        bot('editMessageText', [
            'chat_id' => $cuserid,
            'message_id' => $cmsgid,
            'parse_mode' => "HTML",
            'text' => $msg,
            'reply_markup' => json_encode([
                'inline_keyboard' => $keyboard
            ])
        ]);
    }
}

function send_product_by_id()
{
    global $text, $footer_msg, $keyboard, $id, $name, $desc, $price, $userid;
    
    if (preg_match('/file/', $text)) {
        if (is_verified($userid)) {

            $input = explode('_', $text);
            $id = $input[1];
            product_info($id);
            product_keyboard($userid);

            // GET message From DB 
            $msg = options('product_info');
            $msg = str_replace("[name]", $name, $msg);
            $msg = str_replace("[desc]", $desc, $msg);
            $msg = str_replace("[price]", $price, $msg);
            $msg = str_replace("[footer_msg]", $footer_msg, $msg);
            $msg = fa_num($msg);

            bot('sendmessage', [
                'chat_id' => $userid,
                'parse_mode' => "HTML",
                'text' => $msg,
                'reply_markup' => json_encode([
                    'inline_keyboard' => $keyboard
                ])
            ]);
        } else {
            request_phone();
        }
    }
}
function already_purchased($userid, $productid)
{
    global $telegram;
    $sql = "select * from sp_orders where userid='$userid'AND productid='$productid' AND type='file'";
    $order = $telegram->db->query($sql);
    $count = $order->rowCount();
    $order_details = $order->fetch(PDO::FETCH_ASSOC);
    if ($count != 0) {
        if ($order_details['status'] == 1) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
function product_info($product_id)
{
    global $telegram, $name, $desc, $type, $price, $demo, $views;
    $sql = "select * from sp_files WHERE id='$product_id' and status=1";
    $db = $telegram->db->query($sql);
    $product = $db->fetch(PDO::FETCH_ASSOC);
    $name = $product['name'];
    $desc = $product['description'];
    $type = $product['type'];
    $price = number_format($product['price']);
    if ($price == 0) {
        $price = 'رایگان';
    } else {
        $price = number_format($product['price']) . " تومان ";
    }
    $demo = $product['demo'];
    $views = $product['views'];
    // Add one view whenever product is shown
    $views += 1;
    $sql_view = "UPDATE sp_files SET views='$views' where id='$product_id'";
    $telegram->db->query($sql_view);
}

function download_file()
{
    global $cdata, $telegram, $cid, $cuserid, $sending_file, $ad, $ad_link;

    if (preg_match('/download/', $cdata)) {
        $input = explode('#', $cdata);
        $id = $input[1];
        $sql = "select * from sp_files WHERE id='$id' and status=1";
        $db = $telegram->db->query($sql);
        $respond = $db->fetch(PDO::FETCH_ASSOC);
        $name = $respond['name'];
        $name = fa_num($name);
        $fileurl = $respond['fileurl'];
        bot('answercallbackquery', [
            'callback_query_id' => $cid,
            'text' => $sending_file,
            'show_alert' => false
        ]);
        if (isset($ad) && !empty($ad)) {
            $ads[] = [['text' => $ad, 'url' => $ad_link]];
            bot('senddocument', [
                'chat_id' => $cuserid,
                'document' => $fileurl,
                'caption' => $name,
                'reply_markup' => json_encode([
                    'inline_keyboard' => $ads
                ])
            ]);
        } else {
            bot('senddocument', [
                'chat_id' => $cuserid,
                'document' => $fileurl,
                'caption' => $name
            ]);
        }
    }
}

function vip()
{
    global $userid, $vip_days, $telegram, $main_keyboard;

    if (is_vip($userid)) {
        $msg = options('vip_remaining');
        $msg = str_replace("[vip_days]", $vip_days, $msg);
        $msg = fa_num($msg);
        $telegram->sendMessageCURL($userid, $msg, $main_keyboard);
    } else {
        show_vip_plans();
    }
}
function show_vip_plans()
{
    global $telegram, $userid, $baseuri, $vip_plans;
    $sql = "select * from sp_vip_plans";
    $db = $telegram->db->query($sql);
    $plans = $db->fetchAll();
    $keyboard = [];
    foreach ($plans as $plan) {
        $id = $plan['id'];
        $name = fa_num($plan['name']);
        $price = fa_num(number_format($plan['price']));
        $keyboard[] = ['text' => "$name - $price تومان ", 'url' => $baseuri . "/vip/pay.php?uid=$userid&vip=$id"];
    }
    $keyboard = array_chunk($keyboard, 1);
    bot('sendmessage', [
        'chat_id' => $userid,
        'text' => $vip_plans,
        'reply_markup' => json_encode(['inline_keyboard' => $keyboard])
    ]);
}

function user_purchased_products($userid)
{
    global $telegram, $go_to_home_keyboard, $botuser, $empty_transactions;
    $sql = "select * from sp_orders where userid=$userid AND status=1";
    $db = $telegram->db->query($sql);
    $user_orders = $db->fetchAll();
    if (empty($user_orders)) {
        $msg = $empty_transactions;
        $telegram->sendHTML($userid, $msg, $go_to_home_keyboard);
    } else {
        foreach ($user_orders as $order) {
            $trans_type = $order['type'];
            $order_product_id = $order['productid'];
            $order_transcode = $order['transcode'];
            $order_price = number_format($order['price']);
            $order_date = jdate('Y/m/d-H:i:s', $order['date']);
            if ($trans_type == 'file') {
                $product_name = fetch_product_name($order_product_id);
                $product_link = "https://t.me/$botuser?start=file_$order_product_id";
            } elseif ($trans_type == 'plan') {
                $product_name = fetch_plan_name($order_product_id);
                $product_link = "";
            }
            $msg = options('orders_msg');
            $msg = str_replace("[product_link]", $product_link, $msg);
            $msg = str_replace("[product_name]", fa_num($product_name), $msg);
            $msg = str_replace("[order_price]", fa_num($order_price), $msg);
            $msg = str_replace("[order_transcode]", fa_num($order_transcode), $msg);
            $msg = str_replace("[order_date]", fa_num($order_date), $msg);
            $telegram->sendHTML($userid, $msg, $go_to_home_keyboard);
        }
    }
}


function fetch_product_name($product_id)
{
    global $telegram;
    $sql = "select * from sp_files where id=$product_id";
    $db = $telegram->db->query($sql)->fetch();
    $product_name = $db['name'];
    return $product_name;
}

function fetch_plan_name($plan_id)
{
    global $telegram;
    $sql = "select * from sp_vip_plans where id=$plan_id";
    $db = $telegram->db->query($sql)->fetch();
    $plan_name = $db['name'];
    return $plan_name;
}

function ticket()
{
    global $ticket_msg, $userid, $telegram, $go_to_home_keyboard;
    $msg = $ticket_msg;
    $telegram->sendHTML($userid, $msg, $go_to_home_keyboard);
    file_put_contents('users/' . $userid . '.txt', 'pending_ticket');
}

function submit_ticket()
{
    global $userid, $telegram, $main_keyboard, $text, $send_ticket, $my_transactions, $my_transactions, $vip_member, $shop, $home, $time, $ticket_sent, $new_ticket, $admin, $search_products;
    $status = file_get_contents('users/' . $userid . '.txt');
    if ($text == $home) {
        file_put_contents('users/' . $userid . '.txt', ' ');
    }
    if ($status == 'pending_ticket' && $text != $send_ticket && $text != $my_transactions && $text != $vip_member && $text != $shop && $text != $shop && $text != $home && $text != $search_products && !(preg_match('/^\/([Ss]tart)/', $text))) {
        $sql = "INSERT INTO sp_tickets VALUES (NULL,'$userid','$text','$time')";
        $telegram->db->query($sql);
        $telegram->sendMessageCURL($userid, $ticket_sent, $main_keyboard);  // Notify user that the ticket is sent;
        $telegram->sendMessageCURL($admin, $new_ticket, $main_keyboard);  // Notify admin that a new ticket is submited;
        file_put_contents('users/' . $userid . '.txt', ' ');
    }
}
function init_search()
{
    global $telegram, $userid, $go_to_home_keyboard, $search_text;
    $msg = $search_text;
    $telegram->sendHTML($userid, $msg, $go_to_home_keyboard);
    file_put_contents('users/' . $userid . '.txt', 'pending_search');
}
function submit_search()
{
    global $userid, $telegram, $main_keyboard, $text, $send_ticket, $my_transactions, $my_transactions, $vip_member, $shop, $home, $search_products, $botuser, $no_search_result, $search_description;
    $status = file_get_contents('users/' . $userid . '.txt');
    if ($text == $home) {
        file_put_contents('users/' . $userid . '.txt', ' ');
    }
    if ($status == 'pending_search' && $text != $send_ticket && $text != $my_transactions && $text != $vip_member && $text != $shop && $text != $shop && $text != $home && $text != $search_products &&  !(preg_match('/^\/([Ss]tart)/', $text))) {
        $sql = "SELECT * FROM sp_files where (name like '%$text%' or description like '%$text%') AND status=1";


        $products = $telegram->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        if ($products) {
            $msg = "🔽 نتیجه ی جستجوی شما: \n\n";
            $i = 1;
            foreach ($products as $product) {
                $product_id = $product['id'];
                $msg .= fa_num($i) . "- <a href='https://t.me/$botuser?start=file_$product_id'>" . fa_num($product['name']) . "</a>\n";
                $i++;
            }
            $msg .= "\n\n";
            $msg .= $search_description;
            $telegram->sendHTML($userid, $msg, $main_keyboard);
        } else {
            $msg = $no_search_result;
            $telegram->sendMessageCURL($userid, $msg, $main_keyboard);
        }
        file_put_contents('users/' . $userid . '.txt', ' ');
    }
}

function most_popular_products()
{
    global $telegram, $userid, $main_keyboard, $cdata, $cuserid, $cid, $cmsgid, $populars_count, $back_to_cats, $popular_products_text, $no_popular_product;
    if (preg_match('/populars/', $cdata)) {

        $sql = "SELECT * FROM sp_files WHERE status=1 ORDER BY views DESC limit $populars_count";
        $db = $telegram->db->query($sql);
        $products = $db->fetchAll();
        if (empty($products)) {
            bot('answercallbackquery', [
                'callback_query_id' => $cid,
                'text' => $no_popular_product,
                'show_alert' => false
            ]);
        } else {
            $keyboard = [];
            foreach ($products as $product) {
                $id = $product['id'];
                $name = $product['name'];
                $keyboard[] = ['text' => "$name", 'callback_data' => "file#$id"];
            }
            $keyboard = array_chunk($keyboard, 1);
            $back_to_cats = [['text' => $back_to_cats, 'callback_data' => "back_to_cats"]];
            array_push($keyboard, $back_to_cats);
            bot('editMessageText', [
                'chat_id' => $cuserid,
                'message_id' => $cmsgid,
                'parse_mode' => "HTML",
                'text' => $popular_products_text,
                'reply_markup' => json_encode(['inline_keyboard' => $keyboard])
            ]);
        }
    }
}
function latest_products()
{
    global $telegram, $userid, $main_keyboard, $cdata, $cuserid, $cid, $cmsgid, $latests_count, $back_to_cats, $latest_products_text, $no_latest_product;
    if (preg_match('/latests/', $cdata)) {

        $sql = "SELECT * FROM sp_files WHERE status=1 ORDER BY id DESC limit $latests_count";
        $db = $telegram->db->query($sql);
        $products = $db->fetchAll();
        if (empty($products)) {
            bot('answercallbackquery', [
                'callback_query_id' => $cid,
                'text' => $no_latest_product,
                'show_alert' => false
            ]);
        } else {
            $keyboard = [];
            foreach ($products as $product) {
                $id = $product['id'];
                $name = $product['name'];
                $keyboard[] = ['text' => "$name", 'callback_data' => "file#$id"];
            }
            $keyboard = array_chunk($keyboard, 1);
            $back_to_cats = [['text' => $back_to_cats, 'callback_data' => "back_to_cats"]];
            array_push($keyboard, $back_to_cats);
            bot('editMessageText', [
                'chat_id' => $cuserid,
                'message_id' => $cmsgid,
                'parse_mode' => "HTML",
                'text' => $latest_products_text,
                'reply_markup' => json_encode(['inline_keyboard' => $keyboard])
            ]);
        }
    }
}

function account_info()
{
    global $telegram, $userid, $go_to_home_keyboard, $no_vip_plan, $phone_not_verified;
    $sql = "SELECT * FROM sp_users where userid='$userid'";
    $db = $telegram->db->query($sql);
    $user = $db->fetch();
    $name = $user['name'];
    $verified = $user['verified'];
    $phone = $user['phone'];
    $vip_plan = $user['vip_plan'];

    if (isset($phone) && $phone != 0 && !empty($phone) && $verified == 1) {
        $phone = $user['phone'];
    } else {
        $phone = $phone_not_verified;
    }

    if (is_vip($userid)) {
        $vip_plan = $user['vip_plan'];
    } else {
        $vip_plan = $no_vip_plan;
    }

    $sqlx = "SELECT SUM(price) as total_orders FROM sp_orders where userid='$userid' AND status=1";
    $orders = $telegram->db->query($sqlx)->fetch();
    $total_orders = number_format($orders['total_orders']);

    $msg = options('account_info');
    $msg = str_replace("[name]", $name, $msg);
    $msg = str_replace("[userid]", $userid, $msg);
    $msg = str_replace("[phone]", $phone, $msg);
    $msg = str_replace("[vip_plan]", $vip_plan, $msg);
    $msg = str_replace("[total_orders]", $total_orders, $msg);
    $msg = fa_num($msg);
    $telegram->sendHTML($userid, $msg, $go_to_home_keyboard);
}
