<?php $row = $story_show->fetch_assoc(); ?>
<div class="story">
	<div class="story_show">
		<div id="story_img">
			<img src="<?php echo hsc($row['image']); ?>">
		</div>
		<div id="story_title">
			<h2><?php echo hsc($row['title']); ?></h2>
		</div>
		<div id="story_text">
			<?php echo hsc($row['text']); ?> 
		</div>
	</div>
</div>