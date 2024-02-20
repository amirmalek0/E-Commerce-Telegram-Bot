<?php
define('INDEX',true);
ob_start();
session_start();
header('Content-type: text/html; charset=UTF-8');

if (isset($_SESSION['username'])) { ?>
<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?= $title ?></title>
    <link rel="icon" type="image/x-icon" href="src/img/favicon.png">
    <meta name="theme-color" content="#229ED9" />


</head>

<?php 
include 'db.php';
include 'jdf.php';
include 'func.php';
?>
<?php
} else {
    header('Location: login.php');
}
?>

<?php
if(isset($_GET['logout'])){
session_unset();
session_destroy();
header('Location:login.php');
}
?>