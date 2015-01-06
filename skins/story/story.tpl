<div class="story">
	<!--Вывод об  добавлении или удалении истории-->
	<?php  if (isset($story_added)) { ?>
		<h2><?php echo $story_added; ?></h2>
	<?php } ?>

	<?php  if (isset($story_deleted)) { ?>
		<h2><?php echo $story_deleted; ?></h2>
	<?php } ?>

	<div id="button_add">
		<a href="index.php?module=story&page=story_add"><p>Добавить историю</p></a>
	</div>
	<!--Вывод всех историй из БД-->
	<?php if(mysqli_num_rows($story)) {
	     while  ($row = mysqli_fetch_assoc($story)) { 
	 ?>
	<div class="story_block"> 
		<div id="title">
			<h1><?php echo htmlspecialchars($row['title']); ?></h1>
		</div>
		<div id ="text">
			<?php echo htmlspecialchars($row['text']); ?>
		</div>
		<div id="button_delete">
		<a href="index.php?module=story&page=story&action=delete&id=<?php echo $row['id'];?>">Удалить историю</a>
	</div>
	</div>
	<?php  
	  	}
	} 
	?>
</div>