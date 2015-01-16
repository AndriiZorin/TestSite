<?php 
//Выводит расширенную инфомрацию об массиве
function array_info($array, $stop = false) {
	echo '<pre>'.print_r($array, 1).'</pre>';
	if 	(!$stop) {
		exit();
	}
};
//Расширеная версия запроса в базу данных
function query ($query) {
	global $link;
	$res = mysqli_query($link, $query);
	if ($res === false) {
		echo "Запрос ".$query.'<br>'.mysql_error($link);
		exit();
	} else {
		return $res;
	}
	
}
