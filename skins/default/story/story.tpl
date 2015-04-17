<div class="story">
	<!--Вывод всех историй из БД-->
	<?php if($story_show->num_rows) { while  ($row = $story_show->fetch_assoc()) { ?>
	
	<div class="story_show"> 
		<div id="story_title">
			<h1><?php echo hsc($row['title']); ?></h1>
		</div>
		<div id ="story_text">
			<?php echo hsc($row['description']); ?> 
			<a href="/story/story_single?id=<?php echo $row['id'];?>"> ... </a>
		</div>
	</div>			
	<?php  	}	} ?>
</div>
