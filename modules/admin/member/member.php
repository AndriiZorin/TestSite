<?php 
if (isset($_SESSION['user']) && $_SESSION['user']['access'] == 1) {
	Core::$CSS[] = '<link rel="stylesheet" href="/skins/'.Core::$VIEW.'/css/member.css" media="screen"  />';

	//Choose a member
	if (isset($_POST['submit_member'])) {
		$user = my_query(
				"SELECT * FROM `user`
				 WHERE `login` = '".mres($_POST['search'])."'
				 LIMIT 1
			");

		$_SESSION['search_user'] = mres($_POST['search']);
		$row = mysqli_fetch_assoc($user);

		if (isset($row['login'])) {
			$_SESSION['info'] = "Показан пользователь с логином: ".$_POST['search'];
		} else {
			$user_error = "Такого пользователя не существует!";
		} 
	} 

	//Update record about a member
	if (isset($_POST['submit_member_up'])) {
		if (isset($_POST['access'])) {
			if($_POST['access'] == 1 || $_POST['access'] == 0 ) {
				my_query(
					"UPDATE `user` SET
					`access` 	 = '".(int)$_POST['access']."'
					WHERE `login` = '".$_SESSION['search_user']."' 
				");

				$_SESSION['info'] = "Запись обновлена!";
			} else {
				$user_error = "Недопустимое значение для доступа. (0 - обычный пользователь, 1 - права админа!";
			}	
		}

	}

	//Delete a member 
	if (isset($_POST['submit_member_del'])) {
		my_query("
			DELETE FROM `user`
			WHERE `login` = '".$_SESSION['search_user']."' 
		");

		$_SESSION['info'] = "Пользователь с логином ".'<span id="LoveStory">'.$_SESSION['search_user'].'</span>'. " удален из базы данных";
	}	

	//Delete sesssion-info
	if (isset($_SESSION['info'])) {
		$info = $_SESSION['info'];
		unset($_SESSION['info']);
	} 
} else {
	header('Location /admin/home/home');
	exit("У вас нету прав доступа к этой странице");
}		