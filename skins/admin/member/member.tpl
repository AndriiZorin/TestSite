<div class="user">
	<!--Вывод пользователя или ошибки-->
	<?php  if (isset($info))  { echo '<h2>'.$info.'</h2>'; } ?>	
	<span id="redtext"><?php echo @$user_error ?></span>

	<form action="" method="post">
		<input type="text"	name="search">
		<input type="submit" name="submit_member" value="Искать пользователя">
	<!--Вывод записи-->
	<?php if (isset($row['login'])) {?>
		<div class="user_single">
			<table>
				<tr>
					<td>ИД</td>
					<td>Логин</td>
					<td>email</td>
					<td>Возраст</td>
					<td>Доступ</td>
					<td>Пол</td>
					<td><input type="submit" name="submit_member_up" value="Обновить запись"></td>
				</tr>
				<tr>
					<td><div id="user_field"><?php echo $row['id']; ?></div></td>
					<td><div id="user_field"><?php echo hsc($row['login']); ?></div></td>
					<td><div id="user_field"><?php echo hsc($row['email']); ?></div></td>
					<td><div id="user_field"><?php echo $row['age']; ?></div></td>
					<td>
						<div id="user_field">
							<input type="text" name="access" SIZE=3 value="<?php echo $row ['access']; ?>">
						</div>
					</td>
					<td><div id="user_field"><?php echo $row['sex']; ?></div></td>
					<td><input type="submit" name="submit_member_del" value="Удалить запись"></td>
				</tr>
			</table>
		</div>
	<?php } ?>
 	</form>
</div>