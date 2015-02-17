<?php
	//Обработка регистрации
	if (isset($_GET['hash'])) {
		my_query(
				"UPDATE `user` SET
				`active` = 1
				WHERE `hash` = '".mres(($_GET['hash']))."'
		");
		$_SESSION['info'] = 'Поздравляем, вы зарегистрировались!'.'</br>'. 
		'Тепер можете '.'<a href="/cabinet/authorization">войти на сайт</a>';
	}

	//Вывод информации
	if (isset($_SESSION['info'])) {
		$info = $_SESSION['info'];
		unset($_SESSION['info']);
	} else {
		$info = "Произошла ошибка, попробуйсте еще раз!";
	}
?>
