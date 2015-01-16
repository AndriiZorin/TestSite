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
		$error = "Query ".$query."<br> \n".mysqli_error($link);
		file_put_contents('logs/mysql.log', strip_tags($error)."\n\n", FILE_APPEND);
		echo $error;
		exit();
	} else {
		return $res;
	}
}
