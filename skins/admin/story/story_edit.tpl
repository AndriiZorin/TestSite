<div class="story_form">
	<form action="" method="post">
	<table>
		<tr>
			<td> 
				<div>Заголовок истории</div>
				<input type="text" name="title" SIZE=130 value="<?php echo hsc($row ['title']); ?>">
			</td>
		</tr>
		<tr>
			<td>
				Краткое описание истории
				<textarea rows="3" cols="100" name="description"><?php echo hsc($row ['description']); ?></textarea>
			</td>
		</tr>
		<tr>
			<td>
				История
				<textarea rows="10" cols="100" name="text"><?php echo hsc($row ['text']); ?></textarea>
			</td>
		</tr>
		<tr>
			<td><span id="redtext"><?php echo @$error_story ?></span></td>
		</tr>
	</table>
	<input type="submit" name="submit_form" value="Обновить историю">
	</form>
</div>