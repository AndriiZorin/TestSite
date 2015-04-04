<?php 
	Core::$CSS[] = '<link rel="stylesheet" href="/skins/'.Core::$VIEW.'/css/story.css" media="screen"  />';

	$story_show = my_query(
		"SELECT * FROM `story`
		 WHERE `id` = ".(int)$_GET['id']." LIMIT 1
	");	