<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и
        горнолыжное снаряжение.</p>
    <ul class="promo__list">
        <?php foreach ($cats as $key => $val): ?>
            <li class="promo__item promo__item--<?= $val['alias'] ?>">
                <a class="promo__link" href="#"><?= $val['name'] ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        <?php foreach ($lots as $key => $val): ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?= $val['preview'] ?>" width="350" height="260" alt="">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?= $cats[$val['cat_id']]['name'] ?></span>
                    <h3 class="lot__title">
                        <a class="text-link" href="pages/lot.html">
                            <?= htmlspecialchars($val['title']) ?>
                        </a>
                    </h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?= cleanUpPrice($val['price']) ?></span>
                        </div>
                        <div class="lot__timer timer">
                            <?= floor($lotExpirationTime / 60 / 60 ) ?> : <?= floor( $lotExpirationTime / 60 ) % 60  ?>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</section>