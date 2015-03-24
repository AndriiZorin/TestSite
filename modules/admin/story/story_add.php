<?php 
 if (isset($_SESSION['user']) && $_SESSION['user']['access'] == 1) {
	Core::$CSS[] = '<link rel="stylesheet" href="/skins/'.Core::$VIEW.'/css/story.css" media="screen"  />';

	if (isset($_POST['submit_form']) && !empty($_POST['submit_form'])) {
		if ( isset($_POST['title'], $_POST['text'], $_POST['description']) && !empty($_POST['title']) && !empty($_POST['text']) && !empty($_POST['description'])) {
	
			my_query(
				"INSERT INTO `story` SET
				`title` 		 = '".mres($_POST['title'])."',
				`text`	  		 = '".mres($_POST['text'])."',
				`description`    = '".mres($_POST['description'])."'
			");

			$_SESSION['info'] = "История успешно добавлена!";
			header("Location: /admin/story/story");
			exit();
		} else {
			$story_error = "Все поля обязательные для заполнения!";
		}
	}
	//Убиваем сессию о инофрмации страницы
	if (isset($_SESSION['info'])) {
		$info = $_SESSION['info'];
		unset($_SESSION['info']);
	} 
} else {
	header('Location /admin/home/home');
	exit("У вас нету прав доступа к этой странице");
}		