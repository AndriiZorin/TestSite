<?php 
	//Вывод отзывов на страницу
	$story = mysqli_query($link,"
		SELECT * FROM `story` ORDER BY `id` DESC
	") or exit(mysqli_error ($link));	
?>