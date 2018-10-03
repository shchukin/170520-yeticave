<?php

require('init.php');


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


/* Вытаскиваем лоты */

$sql = "SELECT `title`, `image`, `price`, `expiry_date`, `c`.`name` AS `category` FROM `lot` `l` JOIN `category` `c` ON `l`.`category_id` = `c`.`category_id` WHERE `winner_id` IS NULL ORDER BY `creation_date` DESC LIMIT 6;";
$result = mysqli_query($con, $sql);

if ($result) {
    $lots = mysqli_fetch_all($result, MYSQLI_ASSOC);
}


/* Рендерим главную страницу */

$page_content = renderTemplate('main.php', ['lots' => $lots,
                                                   'cats' => $cats
]);

$layout_content = renderTemplate('layout.php', ['content' => $page_content,
                                                       'cats' => $cats,
                                                       'title' => 'Yeti Cave',
                                                       'user' => $user,
                                                       'user_name' => $user['name'],
                                                       'user_avatar' => $user['avatar']
]);

print($layout_content);