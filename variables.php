<?php 
	$allowed = array ('home', 'story', 'review', 'registration', 'registration_created', 'story_add');
	if(!isset($_GET['module']) || !isset($_GET['page'])) {
		$_GET['module'] = 'home';
		$_GET['page'] = 'home';
	} elseif(!in_array($_GET['page'],$allowed)) {
		header("HTTP/1.0 404 Not Found");
		exit('Page is not found');
	}
