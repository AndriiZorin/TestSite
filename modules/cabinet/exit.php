<?php 
//Выходим из текущей сессии
session_unset();
session_destroy();
header('Location: index.php?module=home&page=home');
exit("Вы вышли из своего акаунта");
?>