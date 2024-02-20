<?php
if (!defined('INDEX')) {
    die('403-Forbidden Access');
}
define('TOKEN', 'BOT_TOKEN');   //توکن ربات

$products_per_page = 15; // تعداد نمایش محصولات در هر صفحه
$orders_per_page = 10; // تعداد نمایش سفارشات در هر صفحه
$users_per_page = 100; // تعداد نمایش کاربران در هر صفحه
$tickets_per_page = 10; // تعداد نمایش تیکت ها در هر صفحه
$cats_per_page = 10; // تعداد نمایش دسته بندی ها در هر صفحه
$options_per_page = 50; // تعداد نمایش تنظیمات در هر صفحه

function list_cats()
{
    global $db, $cats, $cats_per_page;
    $sql = "select * from sp_cats ORDER BY id DESC LIMIT $cats_per_page";
    $cats = $db->query($sql)->fetchAll();
}
function fetch_cat_info()
{
    global $db, $cat_name, $cat_id;
    $cat_id = intval($_GET['edit_cat']);
    $sql = "select * from sp_cats where id='$cat_id'";
    $cat = $db->query($sql)->fetch();
    $cat_name = $cat['name'];
}
function list_users()
{
    global $db, $users, $users_per_page;
    $sql = "select * from sp_users ORDER BY id DESC LIMIT $users_per_page";
    $users = $db->query($sql)->fetchAll();
}
function list_admins()
{
    global $db, $admins;
    $sql = "select * from sp_admins";
    $admins = $db->query($sql)->fetchAll();
}
function users_count()
{
    global $db, $users;
    $sql = "select * from sp_users";
    $users = $db->query($sql)->fetchAll();
    return count($users);
}
function user_info($userid)
{
    global $db, $user, $name, $username, $phone, $vip_date;
    $sql = "select * from sp_users where userid=$userid";
    $user = $db->query($sql)->fetch();
    $name = $user['name'];
    $userid = $user['userid'];
    $username = $user['username'];
    $phone = $user['phone'];
    $vip_date = $user['vip_date'];
}
function admin_info($id)
{
    global $db, $username;
    $sql = "select * from sp_admins where id=$id";
    $admin = $db->query($sql)->fetch();
    $username = $admin['username'];
}
function user_orders($userid)
{
    global $db, $orders;
    $sql = "select * from sp_orders where userid=$userid";
    $orders = $db->query($sql)->fetchAll();
}
function add_vip_days($userid, $days)
{
    global $vip_date, $db;
    user_info($userid);
    $current_vip_date = $vip_date;
    $days = $days * 86400;
    $new_date = $current_vip_date + $days;
    $sql = "UPDATE sp_users set vip_date='$new_date' where userid='$userid'";
    $result = $db->query($sql);
    if ($result) {
        return true;
    }
}
function remove_not_verified_users(){
    global $db;
    $sql = "DELETE FROM sp_users where phone=0";
    $result = $db->query($sql);
    if ($result) {
        header("Location:users.php");
    }
}
function is_vip($userid)
{
    // Check if User is VIP or not - If user is vip returns remaining days 
    global $userid, $db, $vip_days;
    $sql = "select * from sp_users WHERE userid='$userid'";
    $res = $db->query($sql);
    $user = $res->fetch(PDO::FETCH_ASSOC);
    $vip_date = $user['vip_date'];
    $time = time();
    $now = date($time);
    $day = $vip_date - $now;
    if ($day > 0) {
        $vip_days = number_format($day / 60 / 60 / 24);
        return true;
    } else {
        return false;
    }
}

function list_options()
{
    global $db, $options, $options_per_page;
    $sql = "select * from sp_options LIMIT $options_per_page";
    $options = $db->query($sql)->fetchAll();
}

function list_plans()
{
    global $db, $plans;
    $sql = "select * from sp_vip_plans";
    $plans = $db->query($sql)->fetchAll();
}
function list_products()
{
    global $db, $products, $products_per_page;
    $sql = "select * from sp_files ORDER BY id DESC LIMIT $products_per_page";
    $products = $db->query($sql)->fetchAll();
}

function get_specific_page($page, $type)
{
    global $db, $products, $products_per_page, $orders, $orders_per_page, $users, $users_per_page, $tickets, $tickets_per_page, $cats, $cats_per_page, $options, $options_per_page;
    if ($type == 'products') {
        $page_number = $page;
        $offset =  $products_per_page * ($page_number - 1);
        $sql = "select * FROM sp_files ORDER BY id DESC LIMIT $products_per_page OFFSET $offset";
        $products = $db->query($sql)->fetchAll();
    } elseif ($type == 'orders') {
        $page_number = $page;
        $offset =  $orders_per_page * ($page_number - 1);
        $sql = "select * FROM sp_orders ORDER BY id DESC LIMIT $orders_per_page OFFSET $offset";
        $orders = $db->query($sql)->fetchAll();
    } elseif ($type == 'users') {
        $page_number = $page;
        $offset =  $users_per_page * ($page_number - 1);
        $sql = "select * FROM sp_users ORDER BY id DESC LIMIT $users_per_page OFFSET $offset";
        $users = $db->query($sql)->fetchAll();
    } elseif ($type == 'tickets') {
        $page_number = $page;
        $offset =  $tickets_per_page * ($page_number - 1);
        $sql = "select * FROM sp_tickets ORDER BY id DESC LIMIT $tickets_per_page OFFSET $offset";
        $tickets = $db->query($sql)->fetchAll();
    } elseif ($type == 'cats') {
        $page_number = $page;
        $offset =  $cats_per_page * ($page_number - 1);
        $sql = "select * FROM sp_cats ORDER BY id DESC LIMIT $cats_per_page OFFSET $offset";
        $cats = $db->query($sql)->fetchAll();
    } elseif ($type == 'options') {
        $page_number = $page;
        $offset =  $options_per_page * ($page_number - 1);
        $sql = "select * FROM sp_options LIMIT $options_per_page OFFSET $offset";
        $options = $db->query($sql)->fetchAll();
    }
}

function fetch_pages_count($type)
{
    global $db, $pages_number, $products_per_page, $orders_per_page, $users_per_page, $tickets_per_page, $cats_per_page, $options_per_page;
    if ($type == 'products') {
        $sql = "select * from sp_files";
        $products = $db->query($sql)->fetchAll();
        $products_count = count($products);
        $pages_number = ceil($products_count / $products_per_page);
    } elseif ($type == 'orders') {
        $sql = "select * from sp_orders";
        $orders = $db->query($sql)->fetchAll();
        $orders_count = count($orders);
        $pages_number = ceil($orders_count / $orders_per_page);
    } elseif ($type == 'users') {
        $sql = "select * from sp_users";
        $users = $db->query($sql)->fetchAll();
        $users_count = count($users);
        $pages_number = ceil($users_count / $users_per_page);
    } elseif ($type == 'tickets') {
        $sql = "select * from sp_tickets";
        $tickets = $db->query($sql)->fetchAll();
        $tickets_count = count($tickets);
        $pages_number = ceil($tickets_count / $tickets_per_page);
    } elseif ($type == 'cats') {
        $sql = "select * from sp_cats";
        $cats = $db->query($sql)->fetchAll();
        $cats_count = count($cats);
        $pages_number = ceil($cats_count / $cats_per_page);
    } elseif ($type == 'options') {
        $sql = "select * from sp_options";
        $options = $db->query($sql)->fetchAll();
        $options_count = count($options);
        $pages_number = ceil($options_count / $options_per_page);
    }
}

function products_count()
{
    global $db, $products;
    $sql = "select * from sp_files";
    $products = $db->query($sql)->fetchAll();
    return count($products);
}
function cat_name($cat_id)
{
    global $db;
    $sql = "select * from sp_cats where id='$cat_id'";
    $cat = $db->query($sql)->fetch();
    $cat_name = $cat['name'];
    return $cat_name;
}
function list_tickets()
{
    global $db, $tickets, $tickets_per_page;
    $sql = "select * from sp_tickets ORDER BY id DESC LIMIT $tickets_per_page";
    $tickets = $db->query($sql)->fetchAll();
}
function list_tickets_limit5()
{
    global $db, $tickets;
    $sql = "select * from sp_tickets ORDER BY id DESC LIMIT 5";
    $tickets = $db->query($sql)->fetchAll();
}
function sendMessage($userid, $msg)
{
    $msg = urlencode($msg);
    $url = 'https://api.telegram.org/bot' . TOKEN . '/sendMessage?chat_id=' . $userid . '&text=' . $msg . '&parse_mode=HTML';
    $res = file_get_contents($url);
    if ($res) {
        return true;
    } else {
        return false;
    }
}

function create_cat()
{
    global $db;
    $cat_name = $_POST['cat_name'];
    $sql = "INSERT INTO sp_cats VALUES(NULL,'$cat_name')";
    $result = $db->query($sql);
    if ($result) {
        return true;
    }
}
function create_admin()
{
    global $db;
    $user = $_POST['username'];
    $pass = $_POST['pass'];
    if (!empty($user) && !empty($pass)) {
        $hashed_pwd = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO sp_admins VALUES(NULL,'$user','$hashed_pwd')";
        $result = $db->query($sql);
        if ($result) {
            return true;
        }
    }
}
function change_admin_pass($id)
{
    global $db;
    $pass = $_POST['pass'];
    if (!empty($pass)) {
        $hashed_pwd = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "UPDATE sp_admins SET password='$hashed_pwd' WHERE id=$id";
        $result = $db->query($sql);
        if ($result) {
            return true;
        }
    }
}
function edit_cat()
{
    global $db;
    $cat_name = $_POST['cat_name'];
    $cat_id = $_POST['cat_id'];
    $sql = "UPDATE sp_cats SET name='$cat_name' where id='$cat_id'";
    $result = $db->query($sql);
    if ($result) {
        return true;
    }
}
function delete_cat()
{
    global $db;
    $cat_id = intval($_GET['del_cat']);
    $sql = "DELETE FROM sp_cats where id='$cat_id'";
    $result = $db->query($sql);
    if ($result) {
        return true;
    }
}
function delete_admin()
{
    global $db;
    $admin_id = intval($_GET['del_admin']);
    $sql = "DELETE FROM sp_admins where id='$admin_id'";
    $result = $db->query($sql);
    if ($result) {
        return true;
    }
}
function delete_product()
{
    global $db;
    $product_id = intval($_GET['del_prd']);
    $sql = "DELETE FROM sp_files where id='$product_id'";
    $result = $db->query($sql);
    if ($result) {
        return true;
    }
}
function delete_ticket()
{
    global $db;
    $ticket_id = intval($_GET['del_ticket']);
    $sql = "DELETE FROM sp_tickets where id='$ticket_id'";
    $result = $db->query($sql);
    if ($result) {
        return true;
    }
}
function delete_order()
{
    global $db;
    $order_id = intval($_GET['del_order']);
    $sql = "DELETE FROM sp_orders where id='$order_id'";
    $result = $db->query($sql);
    if ($result) {
        return true;
    }
}
function delete_user()
{
    global $db;
    $user_id = intval($_GET['del_user']);
    $sql = "DELETE FROM sp_users where id='$user_id'";
    $result = $db->query($sql);
    if ($result) {
        return true;
    }
}
function insert_product()
{
    global $db, $empty_inputs;
    $product_name = $_POST['prd_name'];
    $product_description = $_POST['prd_desc'];
    $product_category = $_POST['prd_cat'];
    $file_id = $_POST['file_id'];
    $price = $_POST['price'];
    $product_type = $_POST['prd_type'];
    $product_status = $_POST['prd_status'];
    $product_demo = $_POST['demo'];
    if (isset($product_name) && isset($product_description) && isset($product_category) && isset($file_id) && isset($product_status)) {
        $sql = "INSERT INTO sp_files VALUES(NULL,'$product_name','$product_description','$product_category','$file_id','$product_type','$price','$product_status','$product_demo',0)";
        $result = $db->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    } else {
        $empty_inputs = 1;
    }
}

function fetch_product_info($id)
{
    global $db, $product, $product_name, $product_description, $product_category, $file_id, $price, $product_type, $product_status, $product_demo;
    $sql = "select * from sp_files where id='$id'";
    $product = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    $product_name = $product['name'];
    $product_description = $product['description'];
    $product_category = $product['catid'];
    $file_id = $product['fileurl'];
    $price = $product['price'];
    $product_type = $product['type'];
    $product_status = $product['status'];
    $product_demo = $product['demo'];
}

function update_product($id)
{
    global $db;
    $product_id = $_POST['id'];
    $product_name = $_POST['prd_name'];
    $product_description = $_POST['prd_desc'];
    $product_category = $_POST['prd_cat'];
    $file_id = $_POST['file_id'];
    $price = $_POST['price'];
    $product_type = $_POST['prd_type'];
    $product_status = $_POST['prd_status'];
    $product_demo = $_POST['demo'];
    $sql = "UPDATE sp_files SET name='$product_name',description='$product_description',catid='$product_category',fileurl='$file_id',type='$product_type',price='$price',status='$product_status',demo='$product_demo' where id='$product_id'";
    $result = $db->query($sql);
    if ($result) {
        return true;
    }
}

function total_income()
{
    global $db;
    $sql = "select * from sp_orders where status=1";
    $orders = $db->query($sql)->fetchAll();
    $total_income = 0;
    foreach ($orders as $order) {
        $total_income += $order['price'];
    }
    return number_format($total_income) . " تومان ";
}
function list_orders()
{
    global $db, $orders, $orders_per_page;
    $sql = "select * from sp_orders ORDER BY id DESC LIMIT $orders_per_page";
    $orders = $db->query($sql)->fetchAll();
}
function list_orders_limit5()
{
    global $db, $orders;
    $sql = "select * from sp_orders ORDER BY id DESC LIMIT 5";
    $orders = $db->query($sql)->fetchAll();
}
function fetch_product_name($product_id)
{
    global $db;
    $sql = "select * from sp_files where id=$product_id";
    $result = $db->query($sql)->fetch();
    $product_name = $result['name'];
    echo $product_name;
}
function fetch_plan_name($planid)
{
    global $db;
    $sql = "select * from sp_vip_plans where id=$planid";
    $result = $db->query($sql)->fetch();
    $plan_name = $result['name'];
    echo $plan_name;
}
