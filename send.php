<?php
	
	$link = mysqli_connect(
            'localhost',  /* Хост, к которому мы подключаемся */
            'root',       /* Имя пользователя */
            '1234',   /* Используемый пароль */
            'posts');     /* База данных для запросов по умолчанию */

	if (!$link) {
   		printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
   	exit;
	}

	$result = mysqli_query($link, "INSERT INTO `test`(`NAME`, `MAIL`, `MESSAGE`) VALUES ('".$_POST['name']."','".$_POST['email']."','".$_POST['message']."')");

	header("Location: ./index.php");
	exit;
?>
