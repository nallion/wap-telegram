<html>
<body bgcolor=#292c2f>
<style>
html {
	color: white;
}
</style>
<?php
$password="1234";
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
echo "<form action=photoupload.php?touser=$poluchatel method=post enctype=multipart/form-data>";
echo "<input type=file name=image>";
echo "<button type=submit>Загрузить фото</button>";
echo "</form>";
echo "<a href=/chat.php?sobes=$poluchatel&password=$password><font color=#49baf9>Назад</font></a>";
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
    'message' => '[Отправлено с кнопоного телефона http://naltg.tk:8000](http://naltg.tk:8000)',
    'parse_mode' => 'Markdown'
]);
header("Location: chat.php?sobes=$poluchatel&password=$password");
?>
