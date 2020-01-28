
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Тестовое задание</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
	<div class="row">
		<div class="col-lg-12" >
			<h2>Новое сообщение</h2>
		</div>
	</div>
	<div class="row">
		<form action="./send.php" method="POST">
	  		<fieldset>
	 			Ваше имя:
	  			<input type="text" name="name">
	  			E-mail:
	  			<input type="text" name="email" title="example@gmail.com">
	  			Сообщение:<br>
	  			<textarea rows="10" cols="45" name="message" title="Может содержать неограниченное кол-во символов"></textarea>
	  			<input type="submit" value="Отправить сообщение">
	  		</fieldset>
	  </form>
	</div>

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

	$all = mysqli_query($link, "SELECT * FROM `test`") or die ("Ошибка " . mysqli_error($link));

	if ($all) {
		$rows = mysqli_num_rows($all);

		echo "<div class = 'row' style= 'margin: 30px 0 30px 0'>";
		echo "<div class = 'col-lg-12'>";
		echo "<table align = 'center' style = 'text-align: center'><tr><th><h3>Name</h3></th><th><h3>Mail</h3></th><th><h3>Message</h3></th></tr>";

		for ($i = 0 ; $i < $rows ; ++$i){

			$row = mysqli_fetch_row($all);
			echo "<tr>";
            for ($j = 0 ; $j < 3 ; ++$j) echo "<td style='width: 400px'>$row[$j]</td>";
       		echo "</tr>";
		}
		echo "</table>";
		
		echo "</div>";
		echo "</div>";

		mysqli_free_result($all);
	}

?>
</body>
</html>

