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


