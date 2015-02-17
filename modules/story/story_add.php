<?php 
Core::$CSS[] = '<link rel="stylesheet" href="/skins/default/css/story.css" media="screen"  />';

	if (isset($_POST['submit_form']) && !empty($_POST['submit_form'])) {
		if ( isset($_POST['title'], $_POST['text'], $_POST['description']) && !empty($_POST['title']) && !empty($_POST['text']) && !empty($_POST['description'])) {
			
			my_query(
				"INSERT INTO `story` SET
				`title` 		 = '".mres($_POST['title'])."',
				`text`	  		 = '".mres($_POST['text'])."',
				`description`    = '".mres($_POST['description'])."'
			");

			$_SESSION['info'] = "История успешно добавлена!";
			header("Location: /story/story");
			exit();
		} else {
			$story_error = "Все поля обязательные для заполнения!";
		}
	}
?>