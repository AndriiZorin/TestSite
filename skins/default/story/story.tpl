<div class="story">
	<!--Вывод всех историй из БД-->
	<?php if(mysqli_num_rows($story_show)) { while  ($row = mysqli_fetch_assoc($story_show)) { ?>
		<table>		
			<tr>
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
	<?php  	}	} ?>
</div>
