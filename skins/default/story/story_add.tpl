<?php  if (isset($_SESSION['user']) && $_SESSION['user']['access'] == 1) {?>
<div class="story_form">
	<form action="" method="post">
	<table>
		<tr>
			<td> 
				<div>Заголовок истории</div>
				<input type="text" SIZE=130 name="title"></span>
			</td>
		</tr>
		<tr>
			<td>
				Краткое описание истории
				<textarea rows="3" cols="100" name="description"></textarea>
			</td>
		</tr>
		<tr>
			<td>
				История
				<textarea rows="20" cols="100" name="text"></textarea>
			</td>
		</tr>
		<tr>
			<td><span id="redtext"><?php echo @$story_error ?></span></td>
		</tr>
	</table>
	<input type="submit" name="submit_form" value="Добавить историю">
	</form>
</div>
<?php } else { echo '<div id="infomessage">'."У вас нет прав доступа к этой странице".'</div>'; }?>