<?php 
Core::$CSS[] = '<link rel="stylesheet" href="./skins/default/css/review.css" media="screen"  />';

	//Вывод отзывов на страницу
	$review = my_query("
		SELECT * FROM `review` ORDER BY `date` DESC
	");

	//Занесене написаного отзыва в БД
	if (isset($_POST['submit_review']) && !empty($_POST['submit_review'])) {
		if (isset($_POST['review']) && !empty($_POST['review'])) {

			my_query("
				INSERT INTO `review` SET
				`username` = '".mres($_SESSION['user']['login'])."',
				`review`   = '".mres($_POST['review'])."',
				`date`     = NOW()
			");	
			//Создаем сессию об успешном добавлении отзыва
			$_SESSION['info'] = "Ваш отзыв успешно добавлен!";
			header("Location: index.php?module=review&page=review");
			exit();
		}  else {
			$error_review = "Поле 'отзыв' пустое!";
		}
	}

	//"убиваем"  сессию о добавлении отзыва
	if (isset($_SESSION['info'])) {
		$info = $_SESSION['info'];
		unset($_SESSION['info']);
	} 

	//Множественное удаление
	if (isset($_POST['review_button_delete']) && !empty($_POST['review_button_delete'])) {
	
		filter_int($_POST['review_select']);
		$review_select = implode(", ", $_POST['review_select']);

		my_query("
			DELETE FROM `review`
			WHERE `id` IN (".$review_select.")
		");

		$_SESSION['info'] = "Отзывы удалены!";
		header("Location: index.php?module=review&page=review");
		exit();
	}

		unset($_SESSION['info']);
	if (isset($_SESSION['info'])) {
		$info = $_SESSION['info'];
	} 
?>	