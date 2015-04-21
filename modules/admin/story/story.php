<?php 
if (isset($_SESSION['user']) && $_SESSION['user']['access'] == 1) {
 	Core::$CSS[] = '<link rel="stylesheet" href="/skins/'.Core::$VIEW.'/css/story.css" media="screen"  />';

	//Вывод отзывов на страницу
	$story_show = my_query("SELECT * FROM `story` ORDER BY `id` DESC");	

	//Множественное удаление
	if (isset($_GET['action']) && $_GET['action'] == 'delete') {
		my_query("DELETE FROM `story` WHERE `id` = ".$_GET['id']." ");

		$_SESSION['info'] = "История удалена!";
		header("Location: /admin/story/story");
		exit();
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