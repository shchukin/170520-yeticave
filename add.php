<?php

require('init.php');



if( ! empty($_POST) ) {

    /* Принимаем данные здесь */


    $title         = $_POST['lot-name'] ?? '';
    $description   = $_POST['message']  ?? '';
    $image         = $_POST['photo']    ?? '';
    $creation_date = date ('Y-m-d', time());
    $expiry_date   = $_POST['lot-date'] ?? '';
    $price         = $_POST['lot-rate'] ?? '';
    $step          = $_POST['lot-step'] ?? '';
    $category_id   = $_POST['category'] ?? '';
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






