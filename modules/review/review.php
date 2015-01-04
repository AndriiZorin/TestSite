<?php 
	//Вывод отзывов на страницу
	$review = mysqli_query($link,"
		SELECT * FROM `review` ORDER BY `date` DESC
	") or exit(mysqli_error ($link));
	//Занесене написаного отзыва в БД
	if (isset($_POST['revsubmit']) && !empty($_POST['revsubmit'])) {
		if (isset($_POST['review']) && !empty($_POST['review'])) {
			if (empty($_POST['username'])) {
				mysqli_query($link,
					"INSERT INTO `review` SET
					`username` = 'Гость',
					`review` = '".mysqli_real_escape_string($link, $_POST['review'])."',
					`date` = NOW()
				") or exit(mysqli_error($link));	
			} else {
				mysqli_query($link,
					"INSERT INTO `review` SET
					`username` = '".mysqli_real_escape_string($link, $_POST['username'])."',
					`review` = '".mysqli_real_escape_string($link, $_POST['review'])."',
					`date` = NOW()
				") or exit(mysqli_error($link));	
			}	
			$_SESSION['rev'] = "OK";
			header("Location: index.php?module=review&page=review_added");
			exit();
		}  else {
			$error_review = "Review-message is empty!";
		}
	}
?>