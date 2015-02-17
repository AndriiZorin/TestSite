<?php 
Core::$CSS[] = '<link rel="stylesheet" href="/skins/default/css/story.css" media="screen"  />';
 
	//Вывод отзывов на страницу
	$story_show = my_query("SELECT * FROM `story` ORDER BY `id` DESC");	

	//Множественное удаление
	if (isset($_POST['story_delete']) && !empty($_POST['story_delete'])) {
		filter_int($_POST['story_select']);
		$story_select = implode(", ", $_POST['story_select']);

		my_query("DELETE FROM `story`WHERE `id` IN (".$story_select.")");

		$_SESSION['info'] = "История удалена!";
		header("Location: /story/story");
		exit();
	}

	//Убиваем сессию о инофрмации страницы
	if (isset($_SESSION['info'])) {
		$info = $_SESSION['info'];
		unset($_SESSION['info']);
	} 
?>	