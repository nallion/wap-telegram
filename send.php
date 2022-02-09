<?php
$password="1234";
$komumsg = $_GET['komu'];
$message = $_GET['msg'];
include 'madeline.php';
$MadelineProto = new \danog\MadelineProto\API('session.madeline');
$MadelineProto->start();
$MadelineProto->messages->sendMessage(['peer' => "$komumsg", 'message' => "$message"]);
header("Location: chat.php?sobes=$komumsg&password=$password");

