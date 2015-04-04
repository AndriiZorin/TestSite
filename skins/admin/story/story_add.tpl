<div class="story_picture">
	<!--Вывод об  добавлениее картинки на сайт-->
	<?php  if (isset($info))  { echo '<h2>'.$info.'</h2>'; } ?>
<form action="" method="post" enctype="multipart/form-data">
		Выбрать изображение <input type="file"  name="file"> 
		<div id="redtext"><?php echo @$img_error; ?></div>
	
</div>

<div class="story_form">
		<table >
			<tr>
				<td> 
					Заголовок истории
					<input type="text" SIZE=130 name="title">
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