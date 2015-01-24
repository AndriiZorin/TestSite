<?php
	if(isset($_POST['submit']) && !empty($_POST['submit'])) {
		if (isset($_POST['email'], $_POST['login'], $_POST['password'], $_POST['submit'])) {

			//Проверка на заполнение полей
			$errors = array ();
			if(empty($_POST['login'])) {
				$errors['login'] = "поле 'login' пустое!";
			}
			if(empty($_POST['password'])) {
				$errors['password'] = "поле 'пароль' пустое!";
			}
			if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				$errors['email'] = "поле 'email' пустое!";
			}

			//Заносим пользователья в БД
			if (!count ($errors)) {
				my_query("
					INSERT INTO `user` SET
					`login`    = '".filter_string($_POST['login'])."',
					`password` = '".filter_string($_POST['password'])."',
					`email`    = '".filter_string($_POST['email'])."',
					`age` 	   = '".(int)$_POST['age']."'
				");
				
				//Перенапрпавление в случае удачной регистрации
				$_SESSION['info'] = 'Ваш акаунт успешно создан!';
	 			header("Location: index.php?module=cabinet&page=registration_created");
				exit();
			}
		}
	} 