<?php
$is_auth = rand(0, 1);

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

$cats = [
    [
        'alias' => 'boards',
        'name' => 'Доски и лыжи'
    ],
    [
        'alias' => 'attachment',
        'name' => 'Крепления'
    ],
    [
        'alias' => 'boots',
        'name' => 'Ботинки'
    ],
    [
        'alias' => 'clothing',
        'name' => 'Одежда'
    ],
    [
        'alias' => 'tools',
        'name' => 'Инструменты'
    ],
    [
        'alias' => 'other',
        'name' => 'Разное'
    ]
];

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



$page_content = renderTemplate('index.php', ['lots' => $lots,
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