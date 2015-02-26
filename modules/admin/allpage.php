<?php 
	if (!isset($_SESSION['user']) || $_SESSION['user']['access'] != 1) {
		if($_GET['module'] != 'home' || $_GET['page'] != 'home') {
			header('Location /admin/home/home');
		}
	}	