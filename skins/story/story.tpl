<div class="story">
	<!--Вывод об  добавлении или удалении истории-->
	<?php  if (isset($info)) { ?>
		<h2><?php echo $info; ?></h2>
	<?php } ?>

<form action="" method="post">

	<div class="story_buttons">
		<table>
			<tr>
				<td>
					<div id="story_button_add"><a href="index.php?module=story&page=story_add"><p>Добавить историю</p></a></div>
				</td>
				<td>
					<div id="story_button_delete"><input type="submit" name="story_button_delete" value="Удалить выбранные истории"></div>
				</td>
			</tr>
		</table>
	</div>
	<!--Вывод всех историй из БД-->
	<?php if(mysqli_num_rows($story_show)) {
		    while  ($row = mysqli_fetch_assoc($story_show)) { 
		?>
	<div class="story_block">
		<div class="story_block_border"> 
			<div id="story_block_title">
				<h1><?php echo filter_html_tags($row['title']); ?></h1>
			</div>
			<div id ="story_block_text">
				<?php echo filter_html_tags($row['text']); ?>
			</div>
		</div>

		<div class="story_buttons">
			<table>
				<tr>
					<td>
						<div id="story_button_edit">
							<a href="index.php?module=story&page=story_edit&id=<?php echo $row['id'];?>">Редактировать историю</a>
						</div>	
					</td>	
						<div id="story_select"><input type="checkbox" name="story_select[]" value="<?php echo $row['id'];?>"></div>			
					</td>
				</tr>
			</table>
		</div>	
	</div>
	<?php  
	  	}
	} 
	?>
</form>
</div>
