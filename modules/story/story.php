<?php 
Core::$CSS[] = '<link rel="stylesheet" href="/skins/'.Core::$VIEW.'/css/story.css" media="screen"  />';

	$story_get = my_query("SELECT * FROM `story` ORDER BY `id` DESC");		

	//Paginator
	if (isset($_GET['num'])) {
			$from = $_GET['num'] * CORE::$LIMIT - CORE::$LIMIT;
			$story_show = my_query("
				SELECT * FROM `story`
				ORDER BY `id` DESC
				LIMIT ".$from.", ".CORE::$LIMIT."
			");
	
	} else {
		$story_show = my_query("
			SELECT * FROM `story`
			ORDER BY `id` DESC
			LIMIT 0, 5
		");
	}
