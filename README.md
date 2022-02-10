# Push-button phone telegram client!

Hello to all!<br>
At last time, i need to create telegram client for push-button phones<br>
Now i hard working on it. Now it is proof-on-concept only.<br>
Use it without any claims. When it was ready, i create documentation how install & use it.<br>


What now maded<br>
*Password auth
*Dialogs list<br>
*Chat with user<br>
*Images and documents in chat with user, display non-animated stickers<br>
*Upload photos<br>


# Телеграмм для кнопочных телефонов!
Привет всем!<br>
В последнее время я озаботился созданием телеграмм-клиента для кнопочного телефона.<br>
Данные телефоны, как правило имеют встроенный web/wap - браузер (dorado).<br>
Этот браузер, как правило очень слаб, не поддерживает современные протоколы шифрования, яваскрипт, даже в большинстве случаев цветной текст в нём не обрабатывается.<br>
Это не помеха в использовании Телеграмма.<br>
Также (говорят) что есть места, где запрещены по многим причиным сенсорные телефоны (тюрьма, армия, психбольница).<br>
Веб-версию оригинального телеграмма в браузере дешевого кнопочного телефона Вы, конечно же, не откроете.<br> Вы вообще уже врядли чтото там откроете кроме Гугла и некоторых сайтов, которые созданы для кнопочных телефонов.<br>
Нужно использовать свою версию телеграмм клиента: минимальстичную, адаптированную под браузер кнопочного телефона.<br>
Для решения задачи небходим промежуточный сервер с установленым клиентом телеграмма. Браузер Вашего кнопочного телефона взаимодействует с Вашим промежуточным сервером, Ваш сервер взаимодействует с сервером телеграмма.<br>
Сейчас я очень сильно работаю над написанием и совершенствованием клиента, который поможет людям с кнопочными дешёвыми (от 10$) телефонами общаться в телеграмме с близкими людьми.<br> Оставайтесь на связи!<br>
Данный репозиторий содержит код промежуточного сервера (который я постоянно дописываю).<br> 
В качестве сервероного клиента используется Madelineproto.<br>
В скором времени я выложу документацию по настройке промежуточного сервера. Ожидайте!<br>
В принципе, код в этом репозитории рабочий и используется мной в продакшне.<br> Но на сегодняшний день это больше как пруф-концепт, что это технически возможно.<br> Можете брать код и настраивать сервер у себя.<br>

Что реализовано:<br>
*Авторизация по паролю.<br>
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

# Установка:<br>

1) Купите дешовую vps'ку. Хороший каталог https://poiskvps.ru Операционную систему выберите на свой вкус Проще всего, конечно, с Ubuntu или Debian<br>
2) Установите nginx, php8.1-fpm, git, php8.1-xml, php8.1-mbstring, php8.1-gd<br> Обязательно укажите в директиве server_name нжинкса ваш IP или домен/сабдомен.
3) Настройте nginx и php таким образом, чтобы www-root был /var/www/html , и в нём работал php8.1<br>
4) Перейдите в директорию /var/www/html и склонируйте этот репозиторий прямо в корень /var/www/html<br>
**git clone https://github.com/nallion/wap-telegram.git .** <br>
5) Выставите права 777 на папку /var/www/html
6) Задайте пароль для Вашего телеграмма в файле index.php на 16 строке<br>
7) Пройдите по адресу http://IP_ВАШЕГО_СЕРВЕРА
8) Войдите в телеграмм с паролем, который Вы задали. При первом входе Вам придёться войти в режиме automatically для настройки MadeLine proto. Введите Ваш мобильный номер и войдите в режиме user.
9) Пользуйтесь. Можете пройти с мобильного телефона по адресу http://IP_ВАШЕГО_СЕРВЕРА
