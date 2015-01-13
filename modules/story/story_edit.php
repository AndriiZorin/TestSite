<?php 
	$story_edit = mysqli_query($link,"
		SELECT *
		FROM `story`
		WHERE `id` = ".(int)$_GET['id']." 
		LIMIT 1
	") or exit(mysql_error($link));
	
	if (!mysqli_num_rows($story_edit)) {
		$_SESSION['info'] = "Данной записи не существует!";
		header("Location: index.php?module=story&page=story");
		exit();
	}

	$row = mysqli_fetch_assoc($story_edit);

	if (isset($_POST['submit_story_form']) && !empty($_POST['submit_story_form'])) {
		if (isset($_POST['title'], $_POST['text'], $_POST['description']) && !empty($_POST['title']) && !empty($_POST['text']) && !empty($_POST['description'])) {
			mysqli_query($link, "
				UPDATE `story` SET
				`title` 		 = '".mysqli_real_escape_string($link, $_POST['title'])."',
				`text`	  		 = '".mysqli_real_escape_string($link, $_POST['text'])."',
				`description`    = '".mysqli_real_escape_string($link, $_POST['description'])."'
				WHERE `id` = ".(int)$_GET['id']." 

		") or exit(mysqli_error($link));

		$_SESSION['info'] = "Запись отредактирована!";
		header("Location: index.php?module=story&page=story");
		exit();

		} else {
			$story_error = "Все поля обязательные для заполнения!";
		}
	}
?>
