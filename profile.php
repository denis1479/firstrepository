<?php
session_start();
if (!isset($_SESSION['user'])) {
	header("location: register.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Профиль</title>
</head>
<body>
	<form>
		<p><h1>Приветствуем в вашем личном кабинете!</h1><p>
	<p><?= $_SESSION['user']['login'] ?></p>
	<a href="logout.php">Выход</a>
	</form>
</body>
</html>