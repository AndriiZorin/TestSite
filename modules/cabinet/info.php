<?php
	//Обработка регистрации
	if (isset($_GET['hash'])) {
		my_query(
				"UPDATE `user` SET
				`active` = 1
				WHERE `hash` = '".mres(($_GET['hash']))."'
		");
		$_SESSION['info'] = "Поздравляем! Вы зарегистрировались!";
	}

	//Вывод информации
	if (isset($_SESSION['info'])) {
		$info = $_SESSION['info'];
		unset($_SESSION['info']);
	} else {
		$info = "Произошла ошибка, попробуйсте еще раз!";
	}
?>
