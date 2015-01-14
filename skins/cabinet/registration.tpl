	<div class="reg">
		<h3>Регистрация на LoveStory</h3>
		<form action="" method="post">
			<table>
				<tr>
					<td id="reg_form_text">Логин *</td>
					<td><input type="text" name="login" value="<?php echo @htmlspecialchars($_POST['login']); //Зашита от символов?>"></td>
				</tr>
				<tr>
					<td></td>
					<td><span id="redtext"><?php echo @$errors['login']; ?></span></td>
				</tr>
				<tr>
					<td id="reg_form_text">E-mail *</td>
					<td><input type="email" name="email" value="<?php echo @htmlspecialchars($_POST['email']); ?>"></td>
				</tr>
					<tr>
					<td></td>
					<td><span id="redtext"><?php echo @$errors['email']; ?></span></td>
				</tr>
				<tr>
					<td id="reg_form_text">Пароль *</td>
					<td><input type="password" name="password"></td>
				</tr>
					<tr>
					<td></td>
					<td><span id="redtext"><?php echo @$errors['password']; ?></span></td>
				</tr>
				<tr>
					<td id="reg_form_text">Возраст  </td>
					<td><input type="text" name="age" value="<?php if (isset($_POST['age'])) {echo @($_POST['age']);} //Вывод возрасста, если он существует?>"></td>
				</tr>
			</table>
			<div id="reg_submit"><input type="submit" name="submit" value="Создать акаунт"></div>
			<div id="reg_required_field">* обязательные для заполнения поля</div>
		</form>
	</div>
