<?php 
if (isset($_SESSION['user']) && $_SESSION['user']['access'] == 1) {
	Core::$CSS[] = '<link rel="stylesheet" href="/skins/'.Core::$VIEW.'/css/story.css" media="screen"  />';

	//Upload logo for story
	$img_mime = array ('image/gif','image/jpeg', 'image/png', 'image/jpg');
	$img_ext = array ('jpg', 'jpeg', 'gif', 'png');

	//Added new story
	if (isset($_POST['submit_form']) && !empty($_POST['submit_form'])) {
		if (isset($_POST['title'], $_POST['text'], $_POST['description']) && !empty($_POST['title']) && !empty($_POST['text']) && !empty($_POST['description'])) {
			//Upload image
			if ($_FILES['file']['size'] < 500 || $_FILES['file']['size'] > 500000) {
				$img_error = "Неподходящий размер файла либо картинка не была выбрана!";
			} else {
				preg_match('#\.([a-z]+)$#iu', $_FILES['file']['name'], $matches);
				if (isset($matches[1])) {
					$matches[1] = mb_strtolower($matches[1]);

					$temp = getimagesize($_FILES['file']['tmp_name']);
					$name = './upload/story/'.date('Ymd').'img'.rand(10000, 99999).'.jpg';

					if (!in_array($matches[1], $img_ext)) {
						$img_error = "Неподходит расширение картинки!";
					} elseif (!in_array($temp['mime'], $img_mime)) {
						$img_error = "Неподходящий тип файла, можно загружать только картинки!";
					} elseif (!move_uploaded_file($_FILES['file']['tmp_name'],$name)) {
						$img_error = "ОШИБКА! Картинка НЕ загружена.";
					} else {
						my_query(
							"INSERT INTO `story` SET
								`title` 		 = '".mres($_POST['title'])."',
								`text`	  		 = '".mres($_POST['text'])."',
								`description`    = '".mres($_POST['description'])."',
								`image` 		 = '.$name.'
						");

						$_SESSION['info'] = "История успешно добавлена!";
						header("Location: /admin/story/story");
						exit();
					}
				} else {
					$img_error = "ОШИБКА! Принимаемые форматы jpg, jpeg, png, gif";
				}
			}
		} else {
			$story_error = "Все поля обязательные для заполнения!";
		} 	
	}
	
	//Delete session about message-info
	if (isset($_SESSION['info'])) {
		$info = $_SESSION['info'];
		unset($_SESSION['info']);
	} 
} else {
	header('Location /admin/home/home');
	exit("У вас нету прав доступа к этой странице");
}		