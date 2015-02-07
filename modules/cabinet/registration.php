<?php
	if(isset($_POST['submit_reg']) && !empty($_POST['submit_reg'])) {
		if (isset($_POST['email'], $_POST['login'], $_POST['password'])) {

			//Проверка на заполнение полей
			$errors = array ();
			if(empty($_POST['login'])) {
				$errors['login'] = "поле логин пустое";
			} elseif (strlen($_POST['login']) < 2) {
				$errors['login'] = "логин должен быть больше одного символа";
			} elseif (strlen($_POST['login']) > 25) {
				$errors['login'] = "логин  должен содержат меньше 25-ти символов";
			}
			if(strlen($_POST['password']) < 4) {
				$errors['password'] = "пароль должен содержать от 4-ых символов";
			}
			if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				$errors['email'] = "поле email пустое";
			}

			//Проверка на существование логина и имейла при регистрации

			if (!count($errors)) {
				$res = my_query(
				   "SELECT `id`
					FROM `user`
					WHERE `login` = '".mres($_POST['login'])."'
					LIMIT 1
				");
				if (mysqli_num_rows($res)) {
					$errors['login'] = "такой логин уже занят";
				}

				$res = my_query(
				   "SELECT `id`
					FROM `user`
					WHERE `email` = '".mres($_POST['email'])."'
					LIMIT 1
				");
				if (mysqli_num_rows($res)) {
					$errors['email'] = "такой email уже существует";
				}
			}

			//Добавление нового пользователя в БД
			if (!count ($errors)) {
				my_query(
					"INSERT INTO `user` SET
					`login`    = '".mres($_POST['login'])."',
					`password` = '".my_crypt($_POST['password'])."',
					`email`    = '".mres($_POST['email'])."',
					`age` 	   = ".(int)$_POST['age'].",
					`hash`	   = '".my_crypt($_POST['login'], $_POST['age'])."'
				");

				$id = mysqli_insert_id($link);

				//Отправка письма для подтверждения регистрации
				Mail::$to = $_POST['email'];
				Mail::$subject = "Регистрация на LoveStory";
				Mail::$text = 
					'Пройдите по ссылке для завершения регистрации '		
					.DOMAIN.'/index.php?module=cabinet&page=info&id='.$id.'&hash='.my_crypt($_POST['login']).'';
				Mail::send();

				$_SESSION['info'] = 'На вашу почту выслано письмо для активации акаунта!';
	 			header("Location: index.php?module=cabinet&page=info");
				exit();
			}
		}
	} 
?>