<?php

require('init.php');



if( ! empty($_POST) ) {

    /* Принимаем данные здесь */


    $title         = $_POST['lot-name'] ?? '';      // длиннее чем varchar в базе
    $description   = $_POST['message']  ?? '';      // длиннее чем varchar в базе
    $image         = $_POST['photo']    ?? '';      // копирнуть файл, проверить размер и разрешение
    $creation_date = date ('Y-m-d', time());
    $expiry_date   = $_POST['lot-date'] ?? '';      // проверить дату на формат и затем не в прошлом ли она и не далеко ли в будущем
    $price         = $_POST['lot-rate'] ?? '';      // положительность цены, не превышает ли размер инта в базе
    $step          = $_POST['lot-step'] ?? '';      // положительность шага, не превышает ли размер инта в базе
    $category_id   = $_POST['category'] ?? '';      // существует ли такая категория
    $creator_id    = 1;



    $sql = "INSERT INTO `lot` (`title`,   `description`,  `image`,  `creation_date`,  `expiry_date`,  `price`,   `step`,  `category_id`,  `creator_id`, `winner_id`) 
            VALUES            ('$title', '$description', '$image', '$creation_date', '$expiry_date', '$price',  '$step', '$category_id', '$creator_id', NULL)";

    var_dump($sql);

    $result = mysqli_query($con, $sql);

    var_dump($result);

} else {

    /* Рендерим страницу добавления */

    $page_content = renderTemplate('add.php', ['cats' => $cats]);

    $layout_content = renderTemplate('layout.php', ['content' => $page_content,
        'cats' => $cats,
        'user' => $user,
        'title' => 'Добавить лот'
    ]);

    print($layout_content);
}






