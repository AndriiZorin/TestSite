<?php 
	if (isset($_SESSION['user'])) {
		$res = my_query("SELECT *
			FROM `user`
			WHERE `id` = '".$_SESSION['user']['id']."'
			LIMIT 1 
		");
		$_SESSION['user'] = $res->fetch_assoc();
		if ($_SESSION['user']['active'] != 1) {
			header("Location: /cabinet/exit");
			exit();
		}
	}