<?php 
if (isset($_SESSION['user']) && $_SESSION['user']['access'] == 1) {
	Core::$CSS[] = '<link rel="stylesheet" href="/skins/'.Core::$VIEW.'/css/user.css" media="screen"  />';

	//Display existing user
	$user = my_query("SELECT * FROM `user` ORDER BY `id` DESC");

	//Update acess
	if (isset($_POST['submit_form']) && !empty($_POST['submit_form'])) {
		if (isset($_POST['access']) && !empty($_POST['access'])) {

			my_query(
				"UPDATE `user` SET
				`access` = '".(int)$_POST['access']."',
				WHERE `id` = ".(int)$_GET['id']." 

			");

			$_SESSION['info'] = "Доступ обновлен!";
			header("Location: /admin/user/user");
			exit();

		} else {
			$user_error = "Ведено недопустимое значение для доступа!";
		}
	}	

} else {
	header('Location /admin/home/home');
	exit("У вас нету прав доступа к этой странице");
}		