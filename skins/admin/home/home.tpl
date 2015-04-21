<?php 
if (isset($_SESSION['user']) && $_SESSION['user']['access'] == 1) {	
	echo '<div class="cabinet">';
	echo '<div id="redtext">'."Вы вошли в админ-панель".'</div>';
	echo '</div>';
} else {
	include './skins/default/cabinet/authorization.tpl'; 
}
