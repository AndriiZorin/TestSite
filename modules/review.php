<?php 
	//Вывод отзывов на страницу
	$review = mysqli_query($link,"
		SELECT * FROM `reviews` ORDER BY `time` DESC
	") or exit(mysqli_error ($link));
	//Занесене написаного отзыва в БД
	if (isset($_POST['revsubmit']) && !empty($_POST['revsubmit'])) {
		if (isset($_POST['review']) && !empty($_POST['review'])) {
			if (empty($_POST['username'])) {
				mysqli_query($link,
					"INSERT INTO `reviews` SET
					`username` = 'Гость',
					`review` = '".mysqli_real_escape_string($link, $_POST['review'])."',
					`time` = NOW()
				") or exit(mysqli_error($link));	
			} else {
				mysqli_query($link,
					"INSERT INTO `reviews` SET
					`username` = '".mysqli_real_escape_string($link, $_POST['username'])."',
					`review` = '".mysqli_real_escape_string($link, $_POST['review'])."',
					`time` = NOW()
				") or exit(mysqli_error($link));	
			}	
			$_SESSION['rev'] = "OK";
			header("Location: index.php?page=review_added");
			exit();
		}  else {
			$error_review = "Review-message is empty!";
		}
	}
?>