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

	//Access to exicts modules
	if(!isset($_GET['module'])) {
		$_GET['module'] = 'home';
	} else {
		$res = my_query("
			SELECT *
			FROM `page`
			WHERE `module` = '".mres($_GET['module'])."'
		");
		if (!$res->num_rows) {
			header("Location: /error/404");
			exit("ERROR");
		} else {
			$staticpage = $res->fetch_assoc();
			if ($staticpage['static'] == 1) {
				$_GET['module'] = 'static';
				$_GET['page'] = 'static_main';
			}
		}	
	}

	//Access to exicts pages
	if (!isset($_GET['page'])) {
		$_GET['page'] = 'home';
	}

	if (!preg_match('#^[a-z-_]*$#iu', $_GET['page'])) {
		header("Location: /error/404");
		exit();
	}