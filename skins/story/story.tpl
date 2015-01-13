<div class="story">
	<!--Вывод об  добавлении или удалении истории-->
	<?php  if (isset($info)) { ?>
		<h2><?php echo $info; ?></h2>
	<?php } ?>

	<form action="" method="post">

		<div id="story_button_add">
			<a href="index.php?module=story&page=story_add"><p>Добавить историю</p></a>
		</div>
		<input type="submit" name="submit_story_delete" value="Удалить выбранные истории">

	<!--Вывод всех историй из БД-->
	<?php if(mysqli_num_rows($story_show)) {
		    while  ($row = mysqli_fetch_assoc($story_show)) { 
		?>
		<div class="story_block"> 
			<table>
				<td>
					<tr>
						<div id="story_button_delete">
							<a href="index.php?module=story&page=story_edit&id=<?php echo $row['id'];?>">Редактировать</a>
						</div>	
					</tr>
				</td>
				<td>
					<tr>
						<div id="story_select"><input type="checkbox" name="story_select[]" value="<?php echo $row['id'];?>"></div>
					</tr>
				</td>
			</table>
			<div id="story_block_title">
				<h1><?php echo htmlspecialchars($row['title']); ?></h1>
			</div>
			<div id ="story_block_text">
				<?php echo htmlspecialchars($row['text']); ?>
			</div>
		</div>	

	<?php  
	  	}
	} 
	?>
	</form>
</div>
