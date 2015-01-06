<?php 
if (isset($_POST['submit_story_add']) && !empty($_POST['submit_story_add'])) {
	if ( isset($_POST['title'], $_POST['text'], $_POST['description']) && !empty($_POST['title']) && !empty($_POST['text']) && !empty($_POST['description'])) {
		mysqli_query($link,
				"INSERT INTO `story` SET
				`title` 		 = '".mysqli_real_escape_string($link, $_POST['title'])."',
				`text`	  		 = '".mysqli_real_escape_string($link, $_POST['text'])."',
				`description`    = '".mysqli_real_escape_string($link, $_POST['description'])."'
		") or exit(mysqli_error($link));
		//Создаем сессию об успешном добавлении отзыва
		$_SESSION['story_added'] = "История успешно добавлена!";
		header("Location: index.php?module=story&page=story");
		exit();
	} else {
		$error_story = "Все поля обязательные для заполнения!";
	}
}
?>
