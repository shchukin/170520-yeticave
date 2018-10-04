<?php

require('init.php');

$lot_id = $_GET['lot_id'] ?? false;



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




/* Вытаскиваем лот */

$sql = "SELECT `title`, `description`, `image`, `expiry_date`, `step`, `c`.`name` AS `category` FROM `lot` `l` JOIN `category` `c` ON `l`.`category_id` = `c`.`category_id` WHERE `lot_id` = " . $lot_id;
$result = mysqli_query($con, $sql);

if ($result) {

    $lot = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if( ! $lot ) {
        $page = renderTemplate('error.php', ['error' => '404']);
        print($page);
        exit();
    }
}


/* Рендерим страницу лота */

$page_content = renderTemplate('lot.php', ['lot' => $lot,
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