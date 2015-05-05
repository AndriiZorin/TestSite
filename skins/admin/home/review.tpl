<div class="review_before_block">
	<!--Вывод о успешном добавлении отзыва-->
	<?php  if (isset($info)) {  echo '<p>'.$info.'</p>';  } ?>

	<!--Вывод оОбщего количества отзывов-->
	Отзывов на странице: <?php echo $review->num_rows ?>
</div>

<form action="" method="post">
	<div id="review_button_delete">
		<input type="submit" name="review_button_delete" value="Удалить выбранные отзывы" onclick="return areYouSure()">
	</div>

<!--Вывод существующих отзывов-->
<?php if(mysqli_num_rows($review)) { while  ($row = $review->fetch_assoc()) { ?>
	<div class="review">
		<table>
			<tr>
			 	<td>
					<div id="review_select">
						<input type="checkbox" name="review_select[]" value="<?php echo $row['id'];?>">
					</div>
				</td>
				 <td>
					<div class="review_block">
						<div id="review_block_title">
							<h4>
								<?php  echo $row['username']; ?>  
								<span id="review_block_date"><?php  echo $row['date']; ?></span>
							</h4>
						</div>
						<div id="review_block_text">
							<?php echo hsc($row['review']); ?>
						</div>
					</div>
				</td>
			</tr>
		</table>
	</div>
</form>
<?php  
	}
} 
?>