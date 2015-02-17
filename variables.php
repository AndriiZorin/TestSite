<?php 
	//ЧПУ
	if (isset($_GET['route'])) {
		$temp = explode('/', $_GET['route']);
		foreach ($temp as $k => $v) {
			if ($k == 0) {
				$_GET['module'] = $v;
			} elseif($k == 1) {
				if (!empty($v)) {
					$_GET['page'] = $v;
				}
			} else {
				$_GET['key'.($k-1)] = $v;
			}
		}
		unset($_GET['route']);
	} 
	//Регистрация существубщий модулей
	$allowed = array ('home', 'story', 'review', 'cabinet');
	if(!isset($_GET['module']) || !isset($_GET['page'])) {
		$_GET['module'] = 'home';
		$_GET['page'] = 'home';
	} elseif(!in_array($_GET['module'], $allowed)) {
		header("Location: /error/404");
		exit();
	}
