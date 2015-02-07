<?php 
//Убиваем текущую сессию
session_unset();
session_destroy();

header('Location /');
exit();
 ?>