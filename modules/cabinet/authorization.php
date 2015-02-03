<?php 
	if (isset($_POST['submit_auth']) && !empty($_POST['submit_auth'])) {
		if (isset($_POST['password'], $_POST['login'])) {
			$res = my_query("SELECT *
				FROM `user`
				WHERE `login` = '".mres($_POST['login'])."'
				AND `password` = '".my_crypt($_POST['password'])."'
				LIMIT 1
			");

			if (mysqli_num_rows($res)) {
				$errors = "Done";
			} else {
				$errors = "Такого пользователья не существует ".'</br>'."либо пароль был введен не верно";
			}
		}
	}
 ?>