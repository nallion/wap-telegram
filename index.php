<html>
<head>
<title>Wap Telegram</title>
</head>
<body bgcolor=#292c2f>
<?php
//Авторизация
$password="1234";
$password_login = $_GET['password'];
if ($password_login == $password){} else
{
echo "<font color=white>Введите пароль:</font><br>";
echo "<form action=index.php method=get>";
echo "<input type=text name=password>";
echo "<input type=submit value=Войти>";
die();
}
?>
<?php
if (!file_exists('madeline.php')) {
    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
include 'madeline.php';
$MadelineProto = new \danog\MadelineProto\API('session.madeline');
$MadelineProto->start();
$dialogsarr = $MadelineProto->getDialogs();
$host=$_SERVER['SERVER_NAME'];
echo "<font color=white>Выбери собеседника</font>&nbsp;&nbsp;";
echo "<b><font color=#d19a66>";
echo date('H:i');
echo "</font></b>";
echo "<br><br><br>";
$ids = array_column($dialogsarr, 'user_id');
foreach ($ids as $value) {
$info=$MadelineProto->getInfo($value);
$infouser = array_column($info, 'first_name');
foreach ($infouser as $unm) {
echo "<a href='http://$host:8000/chat.php?sobes=$value&password=$password'><b><font color='blue'>$unm</font></b></a> <br>";
}
}
?>
<br><br><br>
<a href=index.php><font color="red">Выйти</font></a>
