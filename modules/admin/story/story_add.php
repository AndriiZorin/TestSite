<?php 
 if (isset($_SESSION['user']) && $_SESSION['user']['access'] == 1) {
	Core::$CSS[] = '<link rel="stylesheet" href="/skins/'.Core::$VIEW.'/css/story.css" media="screen"  />';

	//Upload logo for story
	$img_mime = array ('image/gif','image/jpeg', 'image/png', 'image/jpg');
	$img_ext = array ('jpg', 'jpeg', 'gif', 'png');

	if(isset($_POST['sumbit_upload_img'])) {
		if ($_FILES['file']['size'] < 500 || $_FILES['file']['size'] > 5000000) {
			$img_error = "Неподходящий размер файла!";
		} else {
			preg_match('#\.([a-z]+)$#iu', $_FILES['file']['name'], $matches);
			if (isset($matches[1])) {
				$matches[1] = mb_strtolower($matches[1]);

				$temp = getimagesize($_FILES['file']['tmp_name']);
				$name = './upload/'.date('Ymd').'img'.rand(10000, 99999).'.jpg';

				if (!in_array($matches[1], $img_ext)) {
					$img_error = "Неподходит расширение картинки!";
				} elseif (!in_array($temp['mime'], $img_mime)) {
					$img_error = "Неподходящий тип файла, можно загружать только картинки!";
				} elseif (!move_uploaded_file($_FILES['file']['tmp_name'],$name)) {
					$img_error = "ОШИБКА! Картинка НЕ загружена.";
				} else {
					$_SESSION['info'] = "Картинка успешно добавлена!";
					header("Location: /admin/story/story_add");
					exit();
				}
			} else {
				$img_error = "ОШИБКА! Принимаемые форматы jpg, jpeg, png, gif";
			}
		}
	}

	//Added new story
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

	

	//Delete session about message-info
	if (isset($_SESSION['info'])) {
		$info = $_SESSION['info'];
		unset($_SESSION['info']);
	} 
} else {
	header('Location /admin/home/home');
	exit("У вас нету прав доступа к этой странице");
}		