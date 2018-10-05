<?php

require('init.php');

$lot_id = isset($_GET['lot_id']) ? intval($_GET['lot_id']) : 0;


/* Вытаскиваем лот */

//$lot = [];
//
//if ($lot_id) {
//    $sql = "SELECT `title`, `description`, `image`, `expiry_date`, `step`, `c`.`name` AS `category`, `winner_id` FROM `lot` `l` JOIN `category` `c` ON `l`.`category_id` = `c`.`category_id` WHERE `lot_id` = " . $lot_id;
//    $result = mysqli_query($con, $sql);
//    if ($result) {
//        $lot = mysqli_fetch_array($result, MYSQLI_ASSOC);
//    }
//}
//
//if (!$lot) {
//    http_response_code(404);
//    $page = renderTemplate('error.php', ['error' => 'Лот не существует']);
//    print($page);
//    exit();
//}



/* Рендерим страницу добавления */

$page_content = renderTemplate('add.php', []);

$layout_content = renderTemplate('layout.php', ['content' => $page_content,
                                                       'cats' => $cats,
                                                       'user' => $user,
                                                       'title' => 'Добавить лот'
]);

print($layout_content);

