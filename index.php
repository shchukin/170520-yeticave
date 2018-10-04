<?php

require('init.php');


/* Вытаскиваем лоты */

$sql = "SELECT `lot_id`, `title`, `image`, `price`, `expiry_date`, `c`.`name` AS `category` FROM `lot` `l` JOIN `category` `c` ON `l`.`category_id` = `c`.`category_id` WHERE `winner_id` IS NULL ORDER BY `creation_date` DESC LIMIT 6;";
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
                                                       'user' => $user,
                                                       'title' => 'Yeti Cave'
]);

print($layout_content);