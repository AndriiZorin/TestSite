<?php 
Core::$CSS[] = '<link rel="stylesheet" href="/skins/'.Core::$VIEW.'/css/story.css" media="screen"  />';

	//Вывод историй на страницу
	$story_show = my_query("SELECT * FROM `story` ORDER BY `id` DESC");	