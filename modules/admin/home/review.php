<?php 
if (isset($_SESSION['user']) && $_SESSION['user']['access'] == 1) {
	Core::$CSS[] = '<link rel="stylesheet" href="/skins/'.Core::$VIEW.'/css/review.css" media="screen"  />';

	//Вывод отзывов на страницу
	$review = my_query("
		SELECT * FROM `review` ORDER BY `date` DESC
	");

	//Множественное удаление
	if (isset($_POST['review_button_delete']) && !empty($_POST['review_button_delete'])) {
		
		filter_int($_POST['review_select']);
		$review_select = implode(", ", $_POST['review_select']);

		my_query("
			DELETE FROM `review`
			WHERE `id` IN (".$review_select.")
		");

		$_SESSION['info'] = "Отзывы удалены!";
		header("Location: /admin/home/review");
		exit();
	}

	if (isset($_SESSION['info'])) {
		$info = $_SESSION['info'];
		unset($_SESSION['info']);
	} 
} else {
	header('Location /admin/home/home');
	exit("У вас нету прав доступа к этой странице");
}		