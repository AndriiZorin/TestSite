	<div class="registration">
		<h3>Регистрация на LoveStory</h3>
		<form action="" method="post">
			<table>
				<tr>
					<td id="form_text">Логин *</td>
					<td><input type="text" name="login" value="<?php echo @htmlspecialchars($_POST['login']); ?>"></td>
				</tr>
				<tr>
					<td></td>
					<td><span id="redtext"><?php echo @$errors['login']; ?></span></td>
				</tr>
				<tr>
					<td id="form_text">E-mail *</td>
					<td><input type="email" name="email" value="<?php echo @htmlspecialchars($_POST['email']); ?>"></td>
				</tr>
					<tr>
					<td></td>
					<td><span id="redtext"><?php echo @$errors['email']; ?></span></td>
				</tr>
				<tr>
					<td id="form_text">Пароль *</td>
					<td><input type="password" name="password"></td>
				</tr>
					<tr>
					<td></td>
					<td><span id="redtext"><?php echo @$errors['password']; ?></span></td>
				</tr>
				<tr>
					<td id="form_text">Возраст  </td>
					<td><input type="text" name="age" value="<?php if (isset($_POST['age'])) {echo @($_POST['age']);} //Предовращение XCC-атаки?>"></td>
				</tr>
			</table>
			<div id="submit"><input type="submit" name="submit" value="Создать акаунт"></div>
			<div id="required_field">* обязательные для заполнения поля</div>
			</div>
		</form>
	</div>
