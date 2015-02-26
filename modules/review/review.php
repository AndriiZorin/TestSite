<?php 
Core::$CSS[] = '<link rel="stylesheet" href="/skins/'.Core::$VIEW.'/css/review.css" media="screen"  />';

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
			header("Location: /review/review");
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