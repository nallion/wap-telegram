<html>
<body bgcolor=#292c2f>
<style>
html {
	color: white;
}
</style>
<?php
session_start();
?>
<?php
$password_login = $_GET['password'];
$password_session = $_SESSION["mysession"];
if (empty($password_session)) {echo "<h2><font color=red>НЕТ СЕССИИ!</h2></font>"; die;}
if (empty($password_login))   {echo "<h2><font color=red>НЕТ ПАРОЛЯ!</h2></font>"; die;}
if ($password_login == $password_session) { }
else { echo "<h2><font color=red>СЕССИЯ И ПАРОЛЬ НЕ СОВПАДАЮТ!</h2></font>"; die(); }
?>

<?php
$poluchatel = $_GET['touser'];
//GET UNAME BY ID
include 'madeline.php';
$MadelineProto = new \danog\MadelineProto\API('session.madeline');
$MadelineProto->start();
$info=$MadelineProto->getInfo($poluchatel);
$infouser = array_column($info, 'first_name');
foreach ($infouser as $unm) {
echo "Отправка фото пользователю:&nbsp;<font color=#c678dd>$unm.</font><br>";
}
//END
echo "Просьба выбирать только .jpg - картинки, другое медиа будет проигнорировано.<br><br>";
echo "<form action=photoupload.php?touser=$poluchatel&password=$password_login method=post enctype=multipart/form-data>";
echo "<input type=file name=image>";
echo "<button type=submit>Загрузить фото</button>";
echo "</form>";
echo "<a href=/chat.php?sobes=$poluchatel&password=$password_login><font color=#49baf9>Назад</font></a>";
?>
<?php
#include 'madeline.php';
#$MadelineProto = new \danog\MadelineProto\API('session.madeline');
$uploadfile = '/tmp/' . basename($_FILES['image']['name']);
echo '<pre>';
if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
    echo "Фото отправлено!";
$filepath = $_FILES['image']['name'];
$fullfilepath = "/tmp/" . $filepath;
}
$MadelineProto->start();
    $MadelineProto->messages->sendMedia([
    'peer' => $poluchatel,
    'media' => [
        '_' => 'inputMediaUploadedPhoto',
        'file' => $fullfilepath
    ],
    'message' => '[Отправлено с кнопочного телефона https://github.com/nallion/wap-telegram](https://github.com/nallion/wap-telegram)',
    'parse_mode' => 'Markdown'
]);
header("Location: chat.php?sobes=$poluchatel&password=$password_login");
?>
