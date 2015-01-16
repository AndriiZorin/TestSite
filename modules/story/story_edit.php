<?php 
	$story_edit = query("
		SELECT *
		FROM `story`
		WHERE `id` = ".(int)$_GET['id']." 
		LIMIT 1
	");
	
	if (!mysqli_num_rows($story_edit)) {
		$_SESSION['info'] = "Данной записи не существует!";
		header("Location: index.php?module=story&page=story");
		exit();
	}

	$row = mysqli_fetch_assoc($story_edit);

	if (isset($_POST['story_button_form']) && !empty($_POST['story_button_form'])) {
		if (isset($_POST['title'], $_POST['text'], $_POST['description']) && !empty($_POST['title']) && !empty($_POST['text']) && !empty($_POST['description'])) {
			query("
				UPDATE `story` SET
				`title` 		 = '".mysqli_real_escape_string($link, $_POST['title'])."',
				`text`	  		 = '".mysqli_real_escape_string($link, $_POST['text'])."',
				`description`    = '".mysqli_real_escape_string($link, $_POST['description'])."'
				WHERE `id` = ".(int)$_GET['id']." 

		");

		$_SESSION['info'] = "История обновлена!";
		header("Location: index.php?module=story&page=story");
		exit();

		} else {
			$story_error = "Все поля обязательные для заполнения!";
		}
	}