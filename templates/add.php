<form class="form form--add-lot container<? if( !empty($validation) ) { print(' form--invalid'); } ?>" action="add.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
    <h2>Добавление лота</h2>
    <div class="form__container-two">
        <div class="form__item <? if( isset( $validation['title'] ) ) print('form__item--invalid'); ?>">
            <label for="lot-name">Наименование</label>
            <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" required<? if( isset( $data['title'] ) ) print(' value="' . $data['title'] . '"'); ?>>
            <? if( isset( $validation['title'] ) ) print('<span class="form__error">' . $validation['title'] . '</span>'); ?>
        </div>
        <div class="form__item <? if( isset( $validation['category_id'] ) ) print('form__item--invalid'); ?>">
            <label for="category">Категория</label>
            <select id="category" name="category" required>
                <? foreach ($cats as $key => $val) : ?>
                    <option <? if ( isset($data['category_id']) && $data['category_id'] == $val['category_id']) print(' selected') ?> value="<?= $val['category_id'] ?>"><?= $val['name'] ?></option>
                <? endforeach; ?>
            </select>
            <? if( isset( $validation['category_id'] ) ) print('<span class="form__error">' . $validation['category_id'] . '</span>'); ?>
        </div>
    </div>
    <div class="form__item form__item--wide <? if( isset( $validation['description'] ) ) print('form__item--invalid'); ?>">
        <label for="message">Описание</label>
        <textarea id="message" name="message" placeholder="Напишите описание лота" required><? if( isset( $data['description'] ) ) print($data['description']); ?></textarea>
        <? if( isset( $validation['description'] ) ) print('<span class="form__error">' . $validation['description'] . '</span>'); ?>
    </div>
    <div class="form__item form__item--file <? if( isset( $validation['image'] ) ) print('form__item--invalid'); ?> <? if( !empty( $data['image'] ) ) print('form__item--uploaded'); ?>">
        <label>Изображение</label>
        <div class="preview">
            <button class="preview__remove" type="button">x</button>
            <div class="preview__img">
                <img src="img/avatar.jpg" width="113" height="113" alt="Изображение лота">
            </div>
        </div>
        <div class="form__input-file">
            <input class="visually-hidden" type="file" id="photo2" <? if( isset( $data['image'] ) ) print(' value="' . $data['image']['name'] . '"'); ?> name="photo" required>
            <label for="photo2">
                <span>+ Добавить</span>
            </label>
        </div>
        <? if( isset( $validation['image'] ) ) print('<span class="form__error">' . $validation['image'] . '</span>'); ?>
    </div>
    <div class="form__container-three">
        <div class="form__item form__item--small <? if( isset( $validation['price'] ) ) print('form__item--invalid'); ?>">
            <label for="lot-rate">Начальная цена</label>
            <input id="lot-rate" type="number" name="lot-rate" placeholder="0" required<? if( isset( $data['price'] ) ) print(' value="' . $data['price'] . '"'); ?>>
            <? if( isset( $validation['price'] ) ) print('<span class="form__error">' . $validation['price'] . '</span>'); ?>
        </div>
        <div class="form__item form__item--small <? if( isset( $validation['step'] ) ) print('form__item--invalid'); ?>">
            <label for="lot-step">Шаг ставки</label>
            <input id="lot-step" type="number" name="lot-step" placeholder="0" required<? if( isset( $data['step'] ) ) print(' value="' . $data['step'] . '"'); ?>>
            <? if( isset( $validation['step'] ) ) print('<span class="form__error">' . $validation['step'] . '</span>'); ?>
        </div>
        <div class="form__item <? if( isset( $validation['expiry_date'] ) ) print('form__item--invalid'); ?>">
            <label for="lot-date">Дата окончания торгов</label>
            <input class="form__input-date" id="lot-date" type="date" name="lot-date" required<? if( isset( $data['expiry_date'] ) ) print(' value="' . $data['expiry_date'] . '"'); ?>>
            <? if( isset( $validation['expiry_date'] ) ) print('<span class="form__error">' . $validation['expiry_date'] . '</span>'); ?>
        </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Добавить лот</button>
</form>