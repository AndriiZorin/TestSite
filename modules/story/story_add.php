<?php 
if (isset($_POST['story_button_form']) && !empty($_POST['story_button_form'])) {
	if ( isset($_POST['title'], $_POST['text'], $_POST['description']) && !empty($_POST['title']) && !empty($_POST['text']) && !empty($_POST['description'])) {
		
		my_query("
			INSERT INTO `story` SET
			`title` 		 = '".filter_string ($_POST['title'])."',
			`text`	  		 = '".filter_string ($_POST['text'])."',
			`description`    = '".filter_string ($_POST['description'])."'
		");

		$_SESSION['info'] = "История успешно добавлена!";
		header("Location: index.php?module=story&page=story");
		exit();
	} else {
		$story_error = "Все поля обязательные для заполнения!";
	}
}
