<?php
session_start();
require_once 'db.php';
$pattern = '/^[a-zA-Z](.[a-zA-Z0-9_-]*)$/';
$pattern2 = '/(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{6,}/';
$login = $_POST['login'];
$password = $_POST['password'];
$passwordConfirm = $_POST['password2'];
$salt = '5Sgsh%yh#2gsHk3Gs%s';
$hash = md5($password . $salt);
$md5password = md5($password);
$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");

if (isset($login) and isset($password) and isset($passwordConfirm))
{
if ($password === $passwordConfirm)
{
if (preg_match($pattern, $login))
{
if (preg_match($pattern2, $password))
{
if (mysqli_num_rows($check_user) > 0)
{
	$_SESSION['messageClone'] = '<p style="color:RED">Аккаунт с таким логином уже существует.</p><hr>';
	header('Location: register.php');
}
else
{
mysqli_query($connect, "INSERT INTO `users` (`login`, `password`) VALUES ('$login', '$md5password')");
$_SESSION['message3'] = '<p style="color:GREEN">Вы успешно зарегестрировались, теперь вы можете авторизоваться.</p><hr>';
	header('Location: log.php');
}
}
else
{
	$_SESSION['message2'] = '<p style="color:RED">В вашем пароле присуствуют запрещенные или отстутствуют нужные символы или присутсвуют лишние пробелы.</p><hr><p style="color:GREEN">В вашем логине должен быть один из этих символов: %, $, ^, *, @, #, !, &, (, ).';
	header('Location: register.php');
}
}
else
{
	$_SESSION['message1'] = '<p style="color:RED">В вашем логине присуствуют запрещенные символы или лишние пробелы.</p><hr>Пример логина: <em style="color:GREEN">user</em>, <em style="color:GREEN">ivan_ivanov123</em>.<hr>';
	header('Location: register.php');
}
}
else
{
	$_SESSION['message'] = '<p style="color:RED">Ваши пароли не одинаковые проверьте их написание и попробуйте еще раз.</p><hr>';
	header('Location: register.php');
}
}