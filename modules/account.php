<?php
	if(isset($_POST['submit']) && !empty($_POST['submit'])) {
		if (isset($_POST['email'], $_POST['login'], $_POST['password'])) {
			//Проверка на заполнение полей
			$errors = array ();
			if(empty($_POST['login'])) {
				$errors['login'] = "field 'login' is empty";
			}
			if(empty($_POST['password'])) {
				$errors['password'] = "field 'password' is empty";
			}
			if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				$errors['email'] = "field 'email' is empty";
			}
			//Заносим пользователья в БД
			if (!count($errors)) {
				mysqli_query($link,
					"INSERT INTO `users` SET
					`login` = '".mysqli_real_escape_string($link, $_POST['login'])."',
					`password` = '".mysqli_real_escape_string($link, $_POST['password'])."',
					`email` = '".mysqli_real_escape_string($link, $_POST['email'])."',
					`age` = '".(int)$_POST['age']."'
				") or exit(mysqli_error($link));
				//Перенапрпавление в случае удачной регистрации
				$_SESSION['reg'] = 'OK';
	 			header("Location: index.php?page=account_created");
				exit();
			}
		}
	} 