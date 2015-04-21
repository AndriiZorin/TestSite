<!--добавлениее картинки на сайт-->
<div class="story_picture">
	<?php  if (isset($info))  { echo '<h2>'.$info.'</h2>'; } ?>
<form action="" method="post" enctype="multipart/form-data">
		Выбрать изображение <input type="file"  name="file"> 
		<div id="redtext"><?php echo @$img_error; ?></div>
	
</div>

<div class="story_form">
		<table >
			<tr>
				<td align="right">Заголовок</td>
				<td> <input type="text" SIZE=100 name="title"></td>
			</tr>
			<tr>
				<td align="right">Краткое описание</td>
				<td><textarea rows="3" cols="130" name="description"></textarea></td>
			</tr>
			<tr>
				<td align="right">История</td>
				<td><textarea rows="20" cols="130" name="text"></textarea></td>
			</tr>
			<tr>
				<td><span id="redtext"><?php echo @$story_error ?></span></td>
			</tr>
		</table>
		<div style="text-align:center"><input type="submit" name="submit_form" value="Добавить историю"></div>
</form>
</div>