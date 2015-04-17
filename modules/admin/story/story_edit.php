<?php 
if (isset($_SESSION['user']) && $_SESSION['user']['access'] == 1) {
	Core::$CSS[] = '<link rel="stylesheet" href="/skins/'.Core::$VIEW.'/css/story.css" media="screen"  />';

	$story_edit = my_query("SELECT * FROM `story` WHERE `id` = ".(int)$_GET['id']." LIMIT 1");
		
	if (!$story_edit->num_rows) {
		$_SESSION['info'] = "Данной записи не существует!";
		header("Location: /admin/story/story");
		exit();
	}

	$row = $story_edit->fetch_assoc();

	if (isset($_POST['submit_form']) && !empty($_POST['submit_form'])) {
		if (isset($_POST['title'], $_POST['text'], $_POST['description']) && !empty($_POST['title']) && !empty($_POST['text']) && !empty($_POST['description'])) {
			
			my_query(
				"UPDATE `story` SET
				`title` 		 = '".mres($_POST['title'])."',
				`text`	  		 = '".mres($_POST['text'])."',
				`description`    = '".mres($_POST['description'])."'
				WHERE `id` = ".(int)$_GET['id']." 

			");

			$_SESSION['info'] = "История обновлена!";
			header("Location: /admin/story/story");
			exit();

		} else {
			$story_error = "Все поля обязательные для заполнения!";
		}
	}
} else {
	header('Location /admin/home/home');
	exit("У вас нету прав доступа к этой странице");
}		