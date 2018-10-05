<?php

require('init.php');


/* Принимаем данные здесь? */





/* Рендерим страницу добавления */

$page_content = renderTemplate('add.php', ['cats' => $cats]);

$layout_content = renderTemplate('layout.php', ['content' => $page_content,
                                                       'cats' => $cats,
                                                       'user' => $user,
                                                       'title' => 'Добавить лот'
]);

print($layout_content);

