<?php
session_start();
if (isset($_SESSION['user'])) {
	header("location: profile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Авторизация</title>
</head>
<body>
<form action="login.php" method="post">
	<?php
	if (isset($_SESSION['message3'])) {
	echo '<p class="msg"> ' . $_SESSION['message3'] . ' </p>';
	unset($_SESSION['message3']);
}
	elseif (isset($_SESSION['messageLogin'])) {
	echo '<p class="msg"> ' . $_SESSION['messageLogin'] . ' </p>';
	unset($_SESSION['messageLogin']);
}
	?>
	<p><input type="text" name="login" size="25"> Введите логин<p>
	<p><input type="password" name="password" size="25"> Введите пароль<p>
		<p><button type="submit">Войти</button></p>
</form>
	<br><a href="register.php">Еще нету аккаунта? Зарегестрируйтесь!</a>
</body>
</html>