<?php 
	//Выходим из текущей сессии
	session_unset();
	session_destroy();
	header('Location: /home/home');
	exit("Вы вышли из своего акаунта");