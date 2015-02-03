	<div class="cabinet">
		<h3>Регистрация на <span id="LoveStory_style">LoveStory</span></h3>
		<form action="" method="post">
		<div id="cab_form">
			<table>
				<tr>
					<td id="cab_form_text">Логин*</td>
					<td><input type="text" name="login" value="<?php echo @hsc($_POST['login']); //Зашита от символов?>"></td>
				</tr>
				<tr>
					<td></td>
					<td><span id="redtext"><?php echo @$errors['login']; ?></span></td>
				</tr>
				<tr>
					<td id="cab_form_text">E-mail*</td>
					<td><input type="email" name="email" value="<?php echo @hsc($_POST['email']); ?>"></td>
				</tr>
				<tr>
					<td></td>
					<td><span id="redtext"><?php echo @$errors['email']; ?></span></td>
				</tr>
				<tr>
					<td id="cab_form_text">Пароль*</td>
					<td><input type="password" name="password"></td>
				</tr>
					<tr>
					<td></td>
					<td><span id="redtext"><?php echo @$errors['password']; ?></span></td>
				</tr>
				<tr>
					<td id="cab_form_text">Возраст  </td>
					<td><input type="text" name="age" value="<?php if (isset($_POST['age'])) {echo @($_POST['age']);} //Вывод возраста, если он существует?>"></td>
				</tr>
			</table>
		</div>	
		<input type="submit" name="submit_reg" value="Создать акаунт">
		<div id="reg_required_field">* обязательные для заполнения поля</div>
		</form>
	</div>
