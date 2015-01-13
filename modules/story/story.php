<?php 
	//Вывод отзывов на страницу
	$story_show = mysqli_query($link,"
		SELECT * FROM `story` ORDER BY `id` DESC
	") or exit(mysqli_error ($link));	

	//Множественное удаление

	if (isset($_POST['submit_story_delete'])) {
		foreach ($_POST['story_select'] as $k => $v) {
			$_POST['story_select'][$k] = (int) $v;
		}
		$story_select = implode(", ", $_POST['story_select']);

		mysqli_query($link, "
			DELETE FROM `story`
			WHERE `id` IN (".$story_select.")
		") or exit(mysqli_error($link));

		$_SESSION['info'] = "Запись удалена!";
		header("Location: index.php?module=story&page=story");
		exit();
	}

	//Убиваем сессию о инофрмации страницы
	if (isset($_SESSION['info'])) {
		$info = $_SESSION['info'];
		unset($_SESSION['info']);
	} 

?>