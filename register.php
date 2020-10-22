<?php
session_start();
if (isset($_SESSION['user'])) {
	header("location: profile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Регестрация</title>
</head>
<body>
	<form action="reg.php" method="post">
	<?php
if (isset($_SESSION['message'])) {
	echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
	unset($_SESSION['message']);
}
elseif (isset($_SESSION['message1'])) {
	echo '<p class="msg"> ' . $_SESSION['message1'] . ' </p>';
	unset($_SESSION['message1']);
}
elseif (isset($_SESSION['message2'])) {
	echo '<p class="msg"> ' . $_SESSION['message2'] . ' </p>';
	unset($_SESSION['message2']);
}
elseif (isset($_SESSION['messageClone'])) {
	echo '<p class="msg"> ' . $_SESSION['messageClone'] . ' </p>';
	unset($_SESSION['messageClone']);
}
	?>
<p><input type="text" name="login" size="25"> Введите имя для нового аккаунта</p>
<p><input type="password" name="password" size="25"> Введите пароль для нового аккаунта</p>
<p><input type="password" name="password2" size="25"> Повторите пароль</p>
<p><button type="submit">Зарегестрироваться</button></p>
	</form>
	<br><a href="log.php">Уже есть аккаунт? Войдите!</a>
</body>
</html>