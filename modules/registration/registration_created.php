<?php 
	if (isset($_SESSION['info'])) {
		$info = $_SESSION['info'];
		unset($_SESSION['info']);
	} else {
		$info = 'Произошла ошибка, попробуйсте еще раз!';
	}
?>