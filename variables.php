<?php 
	$allowed = array ('home', 'story', 'review', 'registration', 'registration_created', 'review_added', 'story_add');
	if(!isset($_GET['module'])) {
		$_GET['module'] = 'home';
	} elseif(!in_array($_GET['module'],$allowed)) {
		header("HTTP/1.0 404 Not Found");
		exit('Page is not found');
	}

if(!isset($_GET['page'])) {
	$_GET['page'] = 'home';
}	