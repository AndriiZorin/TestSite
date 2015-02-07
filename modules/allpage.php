<?php 
	if (isset($_SESSION['user'])) {
		$res = my_query("SELECT *
			FROM `user`
			WHERE `id` = ".$_SESSION['user']['id']."
			LIMIT 1 
		");
		$_SESSION['user'] = mysqli_fetch_assoc($res);
		if ($_SESSION['user']['active'] != 1) {
			header("Location: index.php?module=cabinet&page=exit");
			exit();
		}
	}
 ?>