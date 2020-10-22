<?php
session_start();
require_once 'db.php';

$login = $_POST['login'];
$password = md5($_POST['password']);

$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
if (mysqli_num_rows($check_user) > 0)
{
$user = mysqli_fetch_assoc($check_user);

$_SESSION['user'] = [
	"id" => $user['id'], 
	"login" => $user['login']
];
header("location: profile.php");
}
else
{
	$_SESSION['messageLogin'] = '<p style="color:RED">Вы ввели не верный пароль или логин от аккаунта.</p><hr>';
	header('Location: log.php');
}
