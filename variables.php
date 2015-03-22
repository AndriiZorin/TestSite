<?php 
	//CHPU
	if (isset($_GET['route'])) {
		$temp = explode('/', $_GET['route']);

		//Include admin-panel
		if ($temp[0] == 'admin') {
			Core::$APP = Core::$APP.'/admin';
			Core::$VIEW = 'admin';
			unset($temp[0]);
		}

		//Include CHPU
		$i = 0;
		foreach ($temp as $k => $v) {
			if ($i == 0) {
				if (!empty($v)) {
					$_GET['module'] = $v;
				}	
			} elseif($i == 1) {
				if (!empty($v)) {
					$_GET['page'] = $v;
				}
			} else {
				$_GET['key'.($k-1)] = $v;
			}
			++$i;
		}
		unset($_GET['route']);
	}

	//Reg exicts modules
	$allowed = array ('home', 'story', 'review', 'cabinet', 'user');
	if(!isset($_GET['module']) || !isset($_GET['page'])) {
		$_GET['module'] = 'home';
		$_GET['page'] = 'home';
	} elseif(!in_array($_GET['module'], $allowed) && Core::$VIEW != 'admin') {
		header("Location: /error/404");
		exit();
	}