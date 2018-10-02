<?php
$is_auth = rand(0, 1);

date_default_timezone_set('Asia/Ho_Chi_Minh');
$lotExpirationTime = strtotime('tomorrow midnight') - 1;

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';


$lots = [
    [
        'title' => '2014 Rossignol District Snowboard',
        'cat_id' => 0,
        'price' => 10999,
        'preview' => 'img/lot-1.jpg'
    ],
    [
        'title' => 'DC Ply Mens 2016/2017 Snowboard',
        'cat_id' => 0,
        'price' => 159999,
        'preview' => 'img/lot-2.jpg'
    ],
    [
        'title' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'cat_id' => 1,
        'price' => 8000,
        'preview' => 'img/lot-3.jpg'
    ],
    [
        'title' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'cat_id' => 2,
        'price' => 10999,
        'preview' => 'img/lot-4.jpg'
    ],
    [
        'title' => 'Куртка для сноуборда DC Mutiny Charocal',
        'cat_id' => 3,
        'price' => 7500,
        'preview' => 'img/lot-5.jpg'
    ],
    [
        'title' => 'Маска Oakley Canopy',
        'cat_id' => 5,
        'price' => 5400,
        'preview' => 'img/lot-6.jpg'
    ]
];


require('functions.php');


$con = mysqli_connect("localhost", "root", "", "170520-yeticave");

if ($con == false) {
    print("Ошибка подключения: " . mysqli_connect_error());
} else {
    mysqli_set_charset($con, "utf8");


    /* Вытаскиваем категории */

    $sql = "SELECT `alias`, `name` FROM `category`";

    $result = mysqli_query($con, $sql);

    if (!$result) {
        $error = mysqli_error($con);
        print("Ошибка MySQL: " . $error);
    } else {
        $cats = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }


    /* Вытаскивание лотов */

    $sql = "SELECT `title`, `image`, `price`, `c`.`name` AS `category` FROM `lot` `l` JOIN `category` `c` ON `l`.`category_id` = `c`.`category_id` WHERE `winner_id` IS NULL ORDER BY `creation_date` DESC LIMIT 6;";

    $result = mysqli_query($con, $sql);

    if (!$result) {
        $error = mysqli_error($con);
        print("Ошибка MySQL: " . $error);
    } else {
        $lots = mysqli_fetch_all($result, MYSQLI_ASSOC);

        var_dump($lots);
    }

}



$page_content = renderTemplate('main.php', ['lots' => $lots,
                                                   'cats' => $cats,
                                                   'lotExpirationTime' => calculateRemainTime($lotExpirationTime)
]);

$layout_content = renderTemplate('layout.php', ['content' => $page_content,
                                                       'cats' => $cats,
                                                       'title' => 'Yeti Cave',
                                                       'is_auth' => $is_auth,
                                                       'user_name' => $user_name,
                                                       'user_avatar' => $user_avatar
]);

print($layout_content);