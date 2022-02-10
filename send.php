<?php
session_start();
?>
<?php
//Авторизация и безопасность
$password_login = $_GET['password'];
$password_session = $_SESSION["mysession"];
if (empty($password_session)) {echo "<h2><font color=red>НЕТ СЕССИИ!</h2></font>"; die;}
if (empty($password_login))   {echo "<h2><font color=red>НЕТ ПАРОЛЯ!</h2></font>"; die;}
if ($password_login == $password_session) { }
else { echo "<h2><font color=red>СЕССИЯ И ПАРОЛЬ НЕ СОВПАДАЮТ!</h2></font>"; die(); }
?>


<?php
$komumsg = $_GET['komu'];
$message = $_GET['msg'];
include 'madeline.php';
$MadelineProto = new \danog\MadelineProto\API('session.madeline');
$MadelineProto->start();
$MadelineProto->messages->sendMessage(['peer' => "$komumsg", 'message' => "$message"]);
header("Location: chat.php?sobes=$komumsg&password=$password_login");

