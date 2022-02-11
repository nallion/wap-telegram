# Телеграмм для кнопочных телефонов!
# Веб-шлюз телеграмма.

Пощупать в деле: http://tg.naltg.tk  пароль: 123  <br> К сайту подключен тестовый аккаунт телеграмма.
Контакт этого сайта: @waptelegram . К сожалению, антиспам-политика Телеграмма такая, что скорее всего, Вы не напишите с сайта самому себе себе до тех пор, пока не добавите контакт сайта @waptelegram в контакты и не напишете на сайт первыми.

Видеодемонстрация доступна по адресу https://youtu.be/JLjdFo3e-Y8

Привет всем!<br>
В последнее время я озаботился созданием телеграмм-клиента для кнопочного телефона.<br>
Эти телефоны, как правило имеют встроенный web/wap - браузер (dorado) или Opera mini.<br>
Этот браузер, как правило очень слаб, не поддерживает современные протоколы шифрования, яваскрипт, даже в большинстве случаев цветной текст в нём не обрабатывается.<br>
Это не помеха в использовании Телеграмма.<br>
Также (говорят) что есть места, где запрещены по многим причиным сенсорные телефоны (тюрьма, армия, психбольница).<br>
Веб-версию оригинального телеграмма в браузере дешевого кнопочного телефона Вы, конечно же, не откроете.<br> Вы вообще уже врядли чтото там откроете кроме Гугла и некоторых сайтов, которые созданы для кнопочных телефонов и застряли где-то в начале 2000х годов.<br>
Нужно использовать свою версию телеграмм клиента: минималистичную, адаптированную под браузер кнопочного телефона.<br>
Для решения задачи небходим промежуточный сервер с установленым клиентом телеграмма. Браузер Вашего кнопочного телефона взаимодействует с Вашим промежуточным сервером, Ваш сервер взаимодействует с сервером телеграмма.<br>
Сейчас я очень много работаю над написанием и совершенствованием клиента, который поможет людям с кнопочными дешёвыми (от 10$) телефонами общаться в телеграмме с близкими людьми.<br> Оставайтесь на связи!<br>
Данный репозиторий содержит код промежуточного сервера (который я постоянно дописываю).<br> 
В качестве серверного клиента используется Madelineproto.<br>
В принципе, код в этом репозитории рабочий и используется мной в продакшне.<br>Можете брать код и настраивать сервер у себя.<br>

Что реализовано:<br>
*Авторизация по паролю. Безопасная сессия.<br>
*Список диалогов.<br>
*Чат с пользователем.<br>
*Картинки, документы, отображение не анимированных стикеров.<br>
*Загрузка фотографий.<br>

![alt text](https://raw.githubusercontent.com/nallion/wap-telegram/main/.gitignore/g_9.jpg)<br>

Скриншоты c телефона:<br><br>
![alt text](https://github.com/nallion/wap-telegram/blob/main/.gitignore/login.jpg?raw=true)
![alt text](https://raw.githubusercontent.com/nallion/wap-telegram/main/.gitignore/2_dialoglist.jpg)
![alt text](https://raw.githubusercontent.com/nallion/wap-telegram/main/.gitignore/3_dialog.jpg)<br>
Скриншот с ПК (для наглядности, как выглядит чат с собеседником)<br>
![alt text](https://github.com/nallion/wap-telegram/blob/main/.gitignore/fullchat.png?raw=true)<br>

Фото работы на телефонах (Отлично работает в браузерах Dorado и Opera Mini).

![alt text](https://github.com/nallion/wap-telegram/blob/main/.gitignore/1_SIGMA.jpg?raw=true)
![alt text](https://github.com/nallion/wap-telegram/blob/main/.gitignore/1_nokia.jpg?raw=true)
![alt text](https://github.com/nallion/wap-telegram/blob/main/.gitignore/2_SIGMA.jpg?raw=true)
![alt text](https://github.com/nallion/wap-telegram/blob/main/.gitignore/2_nokia.jpg?raw=true)
![alt text](https://github.com/nallion/wap-telegram/blob/main/.gitignore/3_Nokia.jpg?raw=true)
![alt text](https://github.com/nallion/wap-telegram/blob/main/.gitignore/3_SIGMA.jpg?raw=true)
![alt text](https://github.com/nallion/wap-telegram/blob/main/.gitignore/nomi_1.jpg?raw=true)
![alt text](https://github.com/nallion/wap-telegram/blob/main/.gitignore/nomi_2.jpg?raw=true)
![alt text](https://github.com/nallion/wap-telegram/blob/main/.gitignore/nomi_3.jpg?raw=true)
![alt text](https://github.com/nallion/wap-telegram/blob/main/.gitignore/nomi2.4.jpg?raw=true)
![alt text](https://github.com/nallion/wap-telegram/blob/main/.gitignore/nomi2.3.jpg?raw=true)
![alt text](https://github.com/nallion/wap-telegram/blob/main/.gitignore/nomi_2.2.jpg?raw=true)


# Установка:<br>

1) Купите дешовую vps'ку. Хороший каталог https://poiskvps.ru Операционную систему выберите на свой вкус Проще всего, конечно, с Ubuntu или Debian<br>
2) Установите nginx, php8.1-fpm, git, php8.1-xml, php8.1-mbstring, php8.1-gd<br> Обязательно укажите в директиве server_name нжинкса ваш IP или домен/сабдомен.
3) Настройте nginx и php таким образом, чтобы www-root был /var/www/html , и в нём работал php8.1 В качестве индекса укажите index.php<br>
4) Перейдите в директорию /var/www/html и склонируйте этот репозиторий прямо в корень /var/www/html<br>
**git clone https://github.com/nallion/wap-telegram.git .** <br>
5) Выставите права 777 на папку /var/www/html
6) Задайте пароль для Вашего телеграмма в файле index.php на 16 строке<br>
7) Пройдите по адресу http://IP_ВАШЕГО_СЕРВЕРА
8) Войдите в телеграмм с паролем, который Вы задали. При первом входе Вам придёться войти в режиме automatically для настройки MadeLine proto. Введите Ваш мобильный номер, заполните все поля и войдите в режиме user.
9) Пользуйтесь. Можете пройти с мобильного телефона по адресу http://IP_ВАШЕГО_СЕРВЕРА

# Баги
На текущий момент все баги закрыты. Если найдёте баг, пишите разработчику (мне).

# Связь с разработчиком

Телеграмм: @KleynoYaroslav
