<?php 
	if (isset($_SESSION['reg'])) {
		$reg = $_SESSION['reg'];
		unset($_SESSION['reg']);
	} else {
		$reg = 'Произошла ошибка, попробуйсте еще раз!';
	}
?>
<div class="created"><?php echo $reg; ?></div>