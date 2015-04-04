<div class="story">
	<!--Вывод всех историй из БД-->
	<?php if(mysqli_num_rows($story_show)) { while  ($row = mysqli_fetch_assoc($story_show)) { ?>
	
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
