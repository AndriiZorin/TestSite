<div class="story_add_form">
	<form action="" method="post">
	<table>
		<tr>
			<td> 
				<div>Заголовок истории</div>
				<input type="text" name="title"></span>
			</td>
		</tr>
		<tr>
			<td>
				Краткое описание истории
				<textarea rows="3" cols="50" name="description"></textarea>
			</td>
		</tr>
		<tr>
			<td>
				История
				<textarea rows="10" cols="50" name="text"></textarea>
			</td>
		</tr>
		<tr>
			<td><span id="redtext"><?php echo @$error_story ?></span></td>
		</tr>
	</table>
	<input type="submit" name="submit_story_add" value="Добавить историю">
	</form>
</div>
