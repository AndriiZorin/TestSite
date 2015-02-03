<div class="story">
	<!--Вывод об  добавлении или удалении истории-->
	<?php  if (isset($info)) { ?>
		<h2><?php echo $info; ?></h2>
	<?php } ?>

	<form action="" method="post">

	<table>
		<tr>
			<td>
				<div id="story_delete"><input type="submit" name="story_delete" value="Удалить выбранные истории"></div>
			</td>
			<td>
				<div id="story_add"><a href="index.php?module=story&page=story_add"><p>Добавить новую историю</p></a></div>
			</td>
		</tr>
	</table>

	<!--Вывод всех историй из БД-->
	<?php if(mysqli_num_rows($story_show)) {
		    while  ($row = mysqli_fetch_assoc($story_show)) { 
		?>

	<table>
		<tr>
			</td>	
				<div id="story_select">
					<input type="checkbox" name="story_select[]" value="<?php echo $row['id'];?>">
				</div>	
			</td>
			<td>
				<div id="story_edit">
					<a href="index.php?module=story&page=story_edit&id=<?php echo $row['id'];?>">Редактировать историю</a>
				</div>	
				<div class="story_show"> 
					<div id="story_show_title">
						<h1><?php echo hsc($row['title']); ?></h1>
					</div>
					<div id ="story_show_text">
						<?php echo hsc($row['text']); ?>
					</div>
				</div>			
			</td>
		</tr>
	</table>

	<?php  
	  	}
	} 
	?>
	</form>
</div>
