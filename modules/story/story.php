<?php 
	//Вывод отзывов на страницу
	$story = mysqli_query($link,"
		SELECT * FROM `story` ORDER BY `id` DESC
	") or exit(mysqli_error ($link));	

	//Удаление историй
	if (isset($_GET['action']) && $_GET['action'] == 'delete') {
		mysqli_query($link,"
			DELETE FROM `story`
			WHERE `id` = ".$_GET['id']."
		");
		$_SESSION['story_deleted'] = "История удалена!";
		header("Location: index.php?module=story&page=story");
		exit();
	}

	//Убиваем сессию о добавлении истории
	if (isset($_SESSION['story_added'])) {
		$story_added = $_SESSION['story_added'];
		unset($_SESSION['story_added']);
	} 

	//Убиваем сессию о удалении страницы
	if (isset($_SESSION['story_deleted'])) {
		$story_deleted = $_SESSION['story_deleted'];
		unset($_SESSION['story_deleted']);
	} 
?>