<?php 
//Выводит расширенную инфомрацию об массиве
function array_info($array, $stop = false) {
	echo '<pre>'.print_r($array, 1).'</pre>';
	if 	(!$stop) {
		exit();
	}
};
//Расширеная версия запроса в базу данных
function my_query($query) {
	global $link;
	$res = mysqli_query($link, $query);
	if ($res === false) {
		$error = 
			date("H:i d-m-Y")
			."<br> \n"."Query ".$query
			."<br> \n".mysqli_error($link);

		file_put_contents('logs/mysql.log', strip_tags($error)."\n\n", FILE_APPEND);
		echo $error;
		exit();
	} else {
		return $res;
	}
}

//Фильтрация вводимых данных
function filter_int($num) {
	if (!is_array($num)) {
		$num = (int)($num);
	} else {
		$num = array_map('filter_int', $num);
	}

	return $num;
}

function filter_float ($num) {
	if (!is_array($num)) {
		$num = (float)($num);
	} else {
		$num = array_map('filter_float', $num);
	}

	return $num;
}

function filter_string ($string) {
	global $link;
	if (!is_array($string)) {
		$string = mysqli_real_escape_string($link, $string);
	} else {
		$string = array_map('filter_string', $string);
	}

	return $string;
}

function filter_html_tags ($char) {
	if (!is_array($char)) {
		$char = htmlspecialchars($char);
	} else {
		$char = array_map('filter_html_tags', $char);
	}
	return $char;
}
