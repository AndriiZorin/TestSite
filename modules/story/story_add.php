<?php 
if (isset($_POST['story_button_form']) && !empty($_POST['story_button_form'])) {
	if ( isset($_POST['title'], $_POST['text'], $_POST['description']) && !empty($_POST['title']) && !empty($_POST['text']) && !empty($_POST['description'])) {
		mysqli_query($link,
				"INSERT INTO `story` SET
				`title` 		 = '".mysqli_real_escape_string($link, $_POST['title'])."',
				`text`	  		 = '".mysqli_real_escape_string($link, $_POST['text'])."',
				`description`    = '".mysqli_real_escape_string($link, $_POST['description'])."'
		") or exit(mysqli_error($link));

		$_SESSION['info'] = "История успешно добавлена!";
		header("Location: index.php?module=story&page=story");
		exit();
	} else {
		$story_error = "Все поля обязательные для заполнения!";
	}
}
