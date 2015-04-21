<div class="story_form">
	<form action="" method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td align="right">Заменить картинку</td>
			<td><input type="file"  name="file"> <span id="redtext"><?php echo @$img_error; ?></span></td>
		</tr>
		<tr>
			<td></td>
			<td><img src="../<?php echo hsc($row['image']); ?>"></td>
		</tr>
		<tr>
			<td align="right">Заголовок</td>
			<td> <input type="text" name="title" SIZE=100 value="<?php echo hsc($row ['title']); ?>"></td>
		</tr>
		<tr>
			<td align="right">Краткое описание</td>
			<td><textarea rows="3" cols="130" name="description"><?php echo hsc($row ['description']); ?></textarea></td>
		</tr>
		<tr>
			<td align="right">История</td>
			<td><textarea rows="30" cols="130" name="text"><?php echo hsc($row ['text']); ?></textarea></td>
		</tr>
		<tr>
			<td><span id="redtext"><?php echo @$error_story ?></span></td>
		</tr>
	</table>
	<div style="text-align:center"><input type="submit" name="submit_form" value="Обновить историю"></div>
	</form>
</div>