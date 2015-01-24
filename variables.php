<?php 
	//Регистрация существубщий модулей
	$allowed = array ('home', 'story', 'review', 'cabinet');
	if(!isset($_GET['module']) || !isset($_GET['page'])) {
		$_GET['module'] = 'home';
		$_GET['page'] = 'home';
	} elseif(!in_array($_GET['module'], $allowed)) {
		header("HTTP/1.0 404 Not Found");
		exit('Page is not found');
	}
