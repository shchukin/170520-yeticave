<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');

ini_set('display_errors','Off');

require('functions.php');

require('db_connect.php');


$user = [];

$cats = [];

$lots = [];




/* Пользователь */

if (rand(0, 1)) {
    $user['name'] = 'Константин';
    $user['avatar'] = 'img/user.jpg';
}


/* Вытаскиваем категории */


$sql = "SELECT `alias`, `name` FROM `category`";
$result = mysqli_query($con, $sql);

if( $result ) {
    $cats = mysqli_fetch_all($result, MYSQLI_ASSOC);
}


