<div class="user">

		<!--Вывод об обновлении записи или ошибке-->
	<?php  if (isset($info))  { echo '<h2>'.$info.'</h2>'; } ?>	
	<span id="redtext"><?php echo @$user_error ?></span>

	<form action="" method="post">	
		<input type="submit" name="submit_form" value="Обновить доступ">

	<!--Вывод записей-->
<?php if (mysqli_num_rows($user)) { 
	while ($row = mysqli_fetch_assoc($user)) {
?>
	<div class="user_single">
		<table>
			<tr>
				<td>
					ИД
				</td>
				<td>
					Логин
				</td>
				<td>
					email
				</td>
				<td>
					Возраст
				</td>
				<td>
					Доступ
				</td>
				<td>
					Пол
				</td>
			</tr>
			<tr>
				<td>
					 <div id="user_field"><?php echo $row['id']; ?></div>
				</td>
				<td>
					<div id="user_field"><?php echo hsc($row['login']); ?></div>
				</td>
				<td>
					<div id="user_field"><?php echo hsc($row['email']); ?></div>
				</td>
				<td>
					<div id="user_field"><?php echo $row['age']; ?></div>
				</td>
				<td>
						<div id="user_field">
						<input type="text" name="title" SIZE=3 value="<?php echo $row ['access']; ?>">
						</div>
				</td>
				<td>
					<div id="user_field"><?php echo $row['sex']; ?></div>
				</td>
			</tr>
		</table>
	</div>
<?php
	} 
}
 ?>
 	</form>
</div>