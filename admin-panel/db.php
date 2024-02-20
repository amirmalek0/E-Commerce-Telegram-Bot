<?php
$host = 'localhost'; // سرور دیتابیس
$database = 'DATABASE_NAME'; //نام دیتابیس
$user = 'DATABASE_USERNAME'; //یوزرنیم دیتابیس
$pass = 'DATABASE_PASSWORD'; //پسورد دیتابیس
try {
$db = new PDO("mysql:host=$host;dbname=$database",$user,$pass);
$db->query("SET character_set_results=utf8mb4_general_ci");
$db->exec("set names utf8mb4");
} catch (PDOException $error){
echo "مشکلی در اتصال به دیتابیس وجود دارد";
die();
}
