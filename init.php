<?php

ini_set('display_errors','Off');

$con = mysqli_connect("localhost", "root", "", "170520-yeticave");

if (!$con ) {
    $error = mysqli_connect_error();
    $page = renderTemplate('error.php', ['error' => $error]);
    print($page);
    exit();
} else {
    mysqli_set_charset($con, "utf8");
}
