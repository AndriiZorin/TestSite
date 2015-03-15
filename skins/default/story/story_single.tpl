<div class="story">
	<div class="story_show">
		<div id="story_text" style="padding-top: 50px">
			<?php 
				$row = mysqli_fetch_assoc($story_show);
				echo hsc($row['text']); 
			?> 
		</div>
	</div>
</div>