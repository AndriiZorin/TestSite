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
			$_SESSION['review_added'] = "Ваш отзыв успешно добавлен!";
			header("Location: index.php?module=review&page=review");
			exit();
		}  else {
			$error_review = "Поле 'отзыв' пустое!";
		}
	}

	//"убиваем"  сессию о добавлении отзыва
	if (isset($_SESSION['review_added'])) {
		$review_added = $_SESSION['review_added'];
		unset($_SESSION['review_added']);
	} 
 ?>