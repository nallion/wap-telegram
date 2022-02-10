<html>
<body bgcolor=#292c2f>
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
include 'madeline.php';
$MadelineProto = new \danog\MadelineProto\API('session.madeline');
$MadelineProto->start();
$dialog=$_GET["sobes"];
$info=$MadelineProto->getInfo($dialog);
$infouser = array_column($info, 'username');
foreach ($infouser as $unm) {
echo "<font color=lime>Wap telegram</font><br>";
echo "<font color=white>Диалог с: <b><font color=#c678dd>$unm</font></b></font>";
echo "&nbsp;&nbsp;";
echo "<b><font color=#d19a66>";
echo date('H:i');
echo "</font></b>";
echo "<title>$unm</title>";
}
echo"<br>";
$ulast = $MadelineProto->getInfo($unm);
$infouser = array_column($ulast, 'status');
$dlacc = $infouser[0]["_"];
if ($dlacc == "userStatusOnline") {
echo "<b><font color=#98c379>Онлайн</font></b>";
}
if ($dlacc == "userStatusOffline") {
$dlacc2 = $infouser[0]["was_online"];
//echo $dlacc2;
$date2 = date("jS F Y H:i:s", $dlacc2);
echo "<i><font color=white>Был(a) онлайн:&nbsp;</font><font color=red><b>$date2</b></font></i>";
}

echo "<form action=send.php method=get>";
echo "<input type=text name=msg>";
echo "<input type=hidden name=komu value=$dialog>";
echo "<input type=hidden name=password value=$password_login>";
echo "<input type=submit value='Отправить'>";
echo "</form>";
echo "<a href=/photoupload.php?touser=$dialog&password=$password_login><font color=#49baf9>Загрузить фото</font></a><br>";
echo "<br><a href=/index.php?password=$password_login><font color=#49baf9>Назад</font></a><br>";
echo("<a href=chat.php?sobes=$dialog&password=$password_login><font color=#49baf9>Обновить</font></a>");
echo "<br><br>";
$me = $MadelineProto->getSelf();
$myuser = $me["first_name"];
$msgs = $MadelineProto->messages->getHistory(['peer' => $dialog, 'offset_id' => 0, 'offset_date' => 0, 'add_offset' => 0, 'limit' => 30, 'max_id' => 0, 'min_id' => 0, 'hash' => 0 ]);
foreach ($msgs['messages'] as $message) {
              //print_r($message);
              try {
              $imagepath=("/var/www/html/images/");
              $ofn = $MadelineProto->downloadToDir($message, "$imagepath");
              $imgname = str_replace("$imagepath","","$ofn");
              $extension = pathinfo($ofn, PATHINFO_EXTENSION);
              if($extension=="webp") {
              $im = imagecreatefromwebp($ofn);
              imagejpeg($im, "$imagepath/$imgname.jpg", 80);
              echo ("<a href=/images/$imgname.jpg target=new><img src=/images/$imgname.jpg height=180></a><br>");
              }
              if($extension=="jpg") {
              echo ("<a href=/images/$imgname target=new><img src=/images/$imgname height=180></a>");
              echo "<br>";
              } 
              if($extension=="png") {
              echo ("<a href=/images/$imgname target=new><img src=/images/$imgname height=180></a>");
              echo "<br>";
              }
              if($extension=="mp4") {
              echo ("<a href=/images/$imgname target=new><b><font color=#abb2bf>Скачать видео (mp4)</font></b></a>");
              echo "<br>";
              }
              if($extension=="xls") {
              echo ("<a href=/images/$imgname target=new><b><font color=#abb2bf>Документ: $imgname</font></b></a>");
              echo "<br>";
              }
              if($extension=="doc") {
              echo ("<a href=/images/$imgname target=new><b><font color=#abb2bf>Документ: $imgname</font></b></a>");
              echo "<br>";
              }
              if($extension=="xlsx") {
              echo ("<a href=/images/$imgname target=new><b><font color=#abb2bf>Документ: $imgname</font></b></a>");
              echo "<br>";
              }
              if($extension=="docx") {
              echo ("<a href=/images/$imgname target=new><b><font color=#abb2bf>Документ: $imgname</font></b></a>");
              echo "<br>";
              }
              if($extension=="rar") {
              echo ("<a href=/images/$imgname target=new><b><font color=#abb2bf>Документ: $imgname</font></b></a>");
              echo "<br>";
              }
              if($extension=="zip") {
              echo ("<a href=/images/$imgname target=new><b><font color=#abb2bf>Документ: $imgname</font></b></a>");
              echo "<br>";
              }
              if($extension=="MOV") {
              echo ("<a href=/images/$imgname target=new><b><font color=#abb2bf>Скачать видео (mov): $imgname</font></b></a>");
              echo "<br>";
              }
              }
              catch (exception $e) {
             }
              $date = date("H:i:s", $message['date']);
              $out = gmdate($message['out']);
              if ($out == 1) { $out = "<b><font color=#c678dd>$myuser:</font></b>"; } else { $out = "<b><font color=#98c379>$unm:</font></b>"; };
              $cleanmsg=$message['message'];
              $urlregex = '~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i';
              $cleanmsg = preg_replace($urlregex, '<a href="$0" target="new" title="$0"><font color=#49baf9>$0</font></a>', $cleanmsg);
              echo "<font color=#abb2bf>";
              echo $date  ." $out &nbsp; ". $cleanmsg . "<br>";
}
