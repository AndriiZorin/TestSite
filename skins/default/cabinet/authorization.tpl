<div class="cabinet">

	<div id="redtext"><?php if (!isset($status) || $status != 'ok') {echo @$errors;  ?></div>

	<h3>Авторизация</h3>
	<form action="" method="post">
	<div id="cab_form">
		<table>
			<tr>
				<td id="cab_form_text">Логин</td>
				<td><input type="text" name="login"></td>
			</tr>
			<tr>
				<td id="cab_form_text">Пароль </td>
				<td><input type="password" name="password"></td>
			</tr>
		</table>	
	</div>
	<input type="submit" name="submit_auth" value="Войти на сайт">	
	</form>
	<?php 	} else {  ?>Вы авторизированы<?php } ?>
	
</div>