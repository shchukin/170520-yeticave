<?php

$is_auth = rand(0, 1);

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';


require('init.php');


/* Вытаскиваем категории */

$sql = "SELECT `alias`, `name` FROM `category`";

$result = mysqli_query($con, $sql);

if (!$result) {
    $error = mysqli_error($con);
    $page = renderTemplate('error.php', ['error' => $error]);
    print($page);
    exit();
} else {
    $cats = mysqli_fetch_all($result, MYSQLI_ASSOC);
}


/* Вытаскивание лотов */

$sql = "SELECT `title`, `image`, `price`, `expiry_date`, `c`.`name` AS `category` FROM `lot` `l` JOIN `category` `c` ON `l`.`category_id` = `c`.`category_id` WHERE `winner_id` IS NULL ORDER BY `creation_date` DESC LIMIT 6;";

$result = mysqli_query($con, $sql);

if (!$result) {
    $error = mysqli_error($con);
    $page = renderTemplate('error.php', ['error' => $error]);
    print($page);
    exit();
} else {
    $lots = mysqli_fetch_all($result, MYSQLI_ASSOC);
}




$page_content = renderTemplate('main.php', ['lots' => $lots,
                                                   'cats' => $cats
]);

$layout_content = renderTemplate('layout.php', ['content' => $page_content,
                                                       'cats' => $cats,
                                                       'title' => 'Yeti Cave',
                                                       'is_auth' => $is_auth,
                                                       'user_name' => $user_name,
                                                       'user_avatar' => $user_avatar
]);

print($layout_content);