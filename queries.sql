-- INSERT INTO
--   `category`
-- SET
--     `alias` = 'boards', `name` = 'Доски и лыжи',
--     `alias` = 'attachment', `name` = 'Крепления',
--     `alias` = 'boots', `name` = 'Ботинки',
--     `alias` = 'clothing', `name` = 'Одежда',
--     `alias` = 'tools', `name` = 'Инструменты',
--     `alias` = 'other', `name` = 'Разное';



INSERT INTO
  `category` (`alias`, `name`)
VALUES
    ('boards', 'Доски и лыжи'),
    ('attachment', 'Крепления'),
    ('boots', 'Ботинки'),
    ('clothing', 'Одежда'),
    ('tools', 'Инструменты'),
    ('other', 'Разное')
;



INSERT INTO
  `user` (`registration_date`, `email`, `name`, `password`, `avatar`, `contacts`)
VALUES
    ('1984-05-14', 'zuckerberg@facebook.com', 'Mark Zuckerberg',   'mama',            'https://scontent.fsgn5-1.fna.fbcdn.net/v/t34.0-12/16176889_112685309244626_578204711_n.jpg?oh=57d87a1dc57731924c5563942a26727b&oe=5BAE5E68',               'This is my new website. Find me here: https://www.facebook.com/zuck'),
    ('1988-03-14', 'sashaOOgray@gmail.com',   'Александра Серова', '81-66-79',        'https://instagram.fsgn5-1.fna.fbcdn.net/vp/d50ab653a9c27698fca51f95dba7a1ef/5C3E8066/t51.2885-15/e35/35320683_1803117503068010_8634110851785162752_n.jpg', 'https://sashagrey.com'),
    ('1991-03-08', 'a.ivleeva@mail.ru',       'Настенька',         '15cm',            'https://instagram.fsgn2-3.fna.fbcdn.net/vp/00b399b557819de7e4777666a119fe99/5C473F71/t51.2885-15/e35/40427720_291163518153434_6320155964687477332_n.jpg',  'https://www.instagram.com/_agentgirl_'),
    ('1971-06-28', 'mask@yandex.ru',          'Elon Musk',         'tesla',           'https://upload.wikimedia.org/wikipedia/commons/thumb/4/49/Elon_Musk_2015.jpg/800px-Elon_Musk_2015.jpg',                                                    '12 New Manhattan, Olympus Mons, Mars'),
    ('1973-04-13', 'shnur@leningrad.ru',      'Шнур',              'Владивосток2000', 'https://upload.wikimedia.org/wikipedia/commons/5/59/Sergey_Shnurov_%281%29.jpg',                                                                           'www.leningrad.ru'),
    ('1984-10-10', 'durov@qip.ru',            'Павел Дуров',       'putin',           'https://pp.userapi.com/c836333/v836333001/31189/8To0r3d-6iQ.jpg',                                                                                          'https://vk.com/id1')
;



INSERT INTO
  `lot` (`title`, `description`, `image`, `creation_date`, `expiry_date`, `price`, `step`, `category_id`, `creator_id`, `winner_id`)
VALUES
    ('2014 Rossignol District Snowboard',                 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',    'img/lot-1.jpg', '2018-09-27', '2018-11-03', 10999,  100, 1, 2, NULL),
    ('DC Ply Mens 2016/2017 Snowboard',                   'Nam sit amet metus odio',                                    'img/lot-2.jpg', '2018-09-25', '2018-09-26', 159999, 20,  1, 1, 6),
    ('Крепления Union Contact Pro 2015 года размер L/XL', 'Praesent et mollis libero. In sed arcu arcu.',               'img/lot-3.jpg', '2018-09-23', '2018-12-27', 8000,   10,  2, 4, NULL),
    ('Ботинки для сноуборда DC Mutiny Charocal',          'Fusce in nibh gravida, consequat libero eu, pulvinar elit.', 'img/lot-4.jpg', '2018-09-24', '2018-12-31', 10999,  17,  3, 5, NULL),
    ('Куртка для сноуборда DC Mutiny Charocal',           'Aliquam faucibus, mauris non vehicula commodo',              'img/lot-5.jpg', '2018-09-20', '2018-11-06', 7500,   99,  4, 3, NULL),
    ('Маска Oakley Canopy',                               'Phasellus tempus nisl id consectetur dapibus',               'img/lot-6.jpg', '2018-09-27', '2018-11-02', 5400,   70,  5, 2, NULL)
;



INSERT INTO
  `bid` (`placing_date`, `value`, `lot_id`, `user_id`)
VALUES
    ('2018-09-27', 11599, 1, 3),
    ('2018-09-27', 11699, 1, 1),
    ('2018-09-27', 11999, 1, 6),
    ('2018-09-27', 12999, 1, 5),
    ('2018-09-27', 13199, 1, 4),
    ('2018-09-27', 13299, 1, 3),
    ('2018-09-27', 13399, 1, 4),
    ('2018-09-27', 13499, 1, 3),

    ('2018-09-26', 200000, 2, 6),

    ('2018-09-23', 8000, 3, 1),
    ('2018-09-24', 8010, 3, 2),
    ('2018-09-25', 8020, 3, 5),
    ('2018-09-25', 9000, 3, 1),
    ('2018-09-25', 9100, 3, 6),
    ('2018-09-26', 9200, 3, 2),

    ('2018-09-24', 10999, 4, 4),
    ('2018-09-25', 11016, 4, 3),
    ('2018-09-25', 11033, 4, 4),
    ('2018-09-25', 11050, 4, 3),
    ('2018-09-26', 11067, 4, 4),
    ('2018-09-26', 11084, 4, 3),
    ('2018-09-26', 11101, 4, 4),
    ('2018-09-26', 11118, 4, 3),
    ('2018-09-27', 11135, 4, 4),
    ('2018-09-27', 11152, 4, 3),
    ('2018-09-27', 11169, 4, 4),
    ('2018-09-27', 11186, 4, 3),

    ('2018-09-20', 7500, 5, 1),
    ('2018-09-21', 7600, 5, 2),
    ('2018-09-22', 7700, 5, 3),
    ('2018-09-23', 7800, 5, 5),
    ('2018-09-24', 7900, 5, 6),

    ('2018-09-27', 5470, 6, 2)
;



# Получить все категории

SELECT `alias`, `name` FROM `category`;


# обновить название лота по его идентификатору;

UPDATE `lot`
SET `title` = 'Foo Bar'
WHERE `lot_id` = 1;


# Показать лот по его id. Получите также название категории, к которой принадлежит лот

SELECT `title`, `description`, `image`, `creation_date`, `expiry_date`, `price`, `step`, `c`.`name`  FROM `lot` `l`
JOIN `category` `c` ON `l`.`category_id` = `c`.`category_id`
WHERE `lot_id` = 1;


# получить список самых свежих ставок для лота по его идентификатору;

SELECT `placing_date`, `value`, `user_id`
FROM `bid`
WHERE `lot_id` = 5 ORDER BY `placing_date` DESC LIMIT 3;




# Три последних незакрытых лота (TO DO: цену (подсчитать?), количество ставок)

SELECT `title`, `image`, `price`, `c`.`name` FROM `lot` `l`
JOIN `category` `c` ON `l`.`category_id` = `c`.`category_id`
WHERE `winner_id` IS NULL ORDER BY `creation_date` DESC LIMIT 3;



# Попытка вытащить лот с количеством ставок к нему
#SELECT `title`, `image`, FROM `lot`;
#SELECT COUNT(`bid_id`) FROM `bid` WHERE `lot_id` = 1
