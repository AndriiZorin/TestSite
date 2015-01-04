<div class="story">

	<div id="button_add">
		<a href="index.php?module=story&page=story_add"><p>Добавить историю</p></a>
	</div>

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
	</div>
	<?php  
	  	}
	} 
	?>

</div>