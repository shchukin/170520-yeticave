<?php

require('init.php');



if( ! empty($_POST) ) {

    /* Принимаем данные здесь */

    $data = [];

    $data['title']         = $_POST['lot-name'] ?? '';      // длиннее чем varchar в базе
    $data['description']   = $_POST['message']  ?? '';      // длиннее чем varchar в базе
    $data['creation_date'] = date ('Y-m-d', time());
    $data['expiry_date']   = $_POST['lot-date'] ?? '';      // проверить дату на формат и затем не в прошлом ли она и не далеко ли в будущем
    $data['price']         = $_POST['lot-rate'] ?? '';      // положительность цены, не превышает ли размер инта в базе
    $data['step']          = $_POST['lot-step'] ?? '';      // положительность шага, не превышает ли размер инта в базе
    $data['category_id']   = $_POST['category'] ?? '';      // существует ли такая категория
    $data['creator_id']    = 1;
    $data['image']         = $_FILES['photo'] ?? '';        // проверить тип файла



    /* Валидация */

    $validation = [];

    /* title */
    if( empty($data['title']) ) {
        $validation['title'] = 'Введите заголовок';
    }

    /* description */
    if( empty($data['description']) ) {
        $validation['description']  = 'Напишите описание лота';
    }

    /* category_id */
    if( empty($data['category_id']) ) {
        $validation['category_id']  = 'Выберите категорию';
    } else {

        /* Будем проверять не пришел ли айдишник несуществующей категории */
        $isCategoryExist = false;

        /* Сравниваем пришедший айдишник со всеми категориями из базы */
        foreach ($cats as $cat) {
            if( $data['category_id'] == $cat['category_id']) {
                $isCategoryExist = true;
                break;
            }
        }

        /* Если ни одного не нашли */
        if ( ! $isCategoryExist ) {

            $validation['category_id']  = 'Выберите категорию из перечисленных';

            /* Нам придется что-то вывести в селекте категорий
               и раз мы сюда пришли, то это не одна из наших категорий.
               Выведем то, что пользователь ввел значит. */
            $fakeCategoryByUser = ['category_id' => $data['category_id'],
                                   'alias' => '',
                                   'name' => '',
                                  ];
            array_push($cats, $fakeCategoryByUser);
        }
    }

    /* price */
    if( empty($data['price']) ) {
        $validation['price'] = 'Введите цену';
    } else if ( intval($data['price']) <= 0 ) {
        $validation['price'] = 'Введите цену больше нуля';
    }

    /* step */
    if( empty($data['step']) ) {
        $validation['step'] = 'Введите шаг';
    } else if ( intval($data['step']) <= 0 ) {
        $validation['step'] = 'Введите шаг больше нуля';
    }

    /* expiry_date */
    if( empty($data['expiry_date']) ) {
        $validation['expiry_date']  = 'Введите дату';
    } else if ( strtotime( $data['expiry_date'] ) < time() ) {
        $validation['expiry_date'] = 'Введите дату из будущего';
    }

    /* image */
    if( empty($data['image']) ) {
        $validation['image']  = 'Прикрепите файл';
    } else {

         $file_extension = mime_content_type( $_FILES['photo']['tmp_name'] );

         if( $file_extension !== 'image/jpeg' && $file_extension!== 'image/png' && $file_extension!== 'image/gif' ) {
             $validation['image']  = 'Выберите JPG, PNG или GIF файл ';
         }
    }




    if ( empty($validation) ) {

        /* Картинка */

        $data['image'] = '';

        if (isset($_FILES['photo'])) {
            $file_name = $_FILES['photo']['name'];
            $file_path = __DIR__ . '/img/';
            $file_url = '/img/' . $file_name;
            move_uploaded_file($_FILES['photo']['tmp_name'], $file_path . $file_name);
            $data['image'] = $file_url;
        }


        /* Если все валидации пройдена */

        $sql = "INSERT INTO `lot` SET  `title` = \"" . $title = $data['title'] . "\",
                                       `description` = \"" . $data['description'] . "\",   
                                       `image` = \"" . $data['image'] . "\",
                                       `creation_date` = \"" . $data['creation_date'] . "\", 
                                       `expiry_date` = \"" . $data['expiry_date'] . "\",
                                       `price` = \"" . $data['price'] . "\",  
                                       `step` = \"" . $data['step'] . "\", 
                                       `category_id` = \"" . $data['category_id'] . "\",
                                       `creator_id` = \"1\", 
                                       `winner_id` = NULL";

        $result = mysqli_query($con, $sql);

        if( $result ) {
            header("Location: lot.php?lot_id=" . mysqli_insert_id($con) );
        }

    }



    /* Если хоть одна из валидашек не была пройдена, то мы пришли сюда */

    $page_content = renderTemplate('add.php', [
        'cats' => $cats,
        'data' => $data,
        'validation' => $validation
    ]);

    $layout_content = renderTemplate('layout.php', [
        'content' => $page_content,
        'cats' => $cats,
        'user' => $user,
        'title' => 'Добавить лот'
    ]);

    print($layout_content);

} else {

    /* Рендерим страницу добавления */

    $page_content = renderTemplate('add.php', [
        'cats' => $cats
    ]);

    $layout_content = renderTemplate('layout.php', [
        'content' => $page_content,
        'cats' => $cats,
        'user' => $user,
        'title' => 'Добавить лот'
    ]);

    print($layout_content);
}






