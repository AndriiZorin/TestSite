<?php 
	$allowed = array ('home', 'story', 'review', 'registration', 'registration_created', 'review_added');
	if (!isset($_GET['page']) || !in_array($_GET['page'], $allowed)) {
		header("HTTP/1.0 404 Not Found");
		exit('Page is not found');
	}