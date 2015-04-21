<?php  
	Core::$CSS[] = '<link rel="stylesheet" href="/skins/default/css/cabinet.css" media="screen" />';

	//Авторизироваться на сайте заполнив форму
	if (isset($_POST['submit_auth']) && !empty($_POST['submit_auth'])) {
		if (isset($_POST['password'], $_POST['login'])) {
			$res = my_query("SELECT *
				FROM `user`
				WHERE `login` = '".mres($_POST['login'])."'
					AND `password` = '".my_crypt($_POST['password'])."'
					AND `active` = 1
				LIMIT 1
			");

			if (mysqli_num_rows($res)) {
				$_SESSION['user'] = mysqli_fetch_assoc($res);
				$status = 'ok';
			} else {
				$errors = "Пользователь не существует ".'</br>'."либо пароль был введён не верно";
			}
		}
	}
