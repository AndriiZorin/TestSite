<?php 
	//Вывод отзывов на страницу
	$review = mysqli_query($link,"
		SELECT * FROM `review` ORDER BY `date` DESC
	") or exit(mysqli_error ($link));

	//Занесене написаного отзыва в БД
	if (isset($_POST['submit_review']) && !empty($_POST['submit_review'])) {
		if (isset($_POST['review']) && !empty($_POST['review'])) {
			//Если поле имя, не заполнено, то по умолчанию - ГОСТЬ
			if (empty($_POST['username'])) {
				mysqli_query($link,
					"INSERT INTO `review` SET
					`username` = 'Гость', 
					`review`   = '".mysqli_real_escape_string($link, $_POST['review'])."',
					`date`     = NOW()
				") or exit(mysqli_error($link));	
			} else {
				mysqli_query($link,
					"INSERT INTO `review` SET
					`username` = '".mysqli_real_escape_string($link, $_POST['username'])."',
					`review`   = '".mysqli_real_escape_string($link, $_POST['review'])."',
					`date`     = NOW()
				") or exit(mysqli_error($link));	
			}	
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
		foreach ($_POST['review_select'] as $k => $v) {
			$_POST['review_select'][$k] = (int) $v;
		}
		$review_select = implode(", ", $_POST['review_select']);

		mysqli_query($link, "
			DELETE FROM `review`
			WHERE `id` IN (".$review_select.")
		") or exit(mysqli_error($link));

		$_SESSION['info'] = "Отзывы удалены!";
		header("Location: index.php?module=review&page=review");
		exit();
	}

	if (isset($_SESSION['info'])) {
		$info = $_SESSION['info'];
		unset($_SESSION['info']);
	} 