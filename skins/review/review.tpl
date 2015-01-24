<div class="review_before_block">
	<!--Вывод о успешном добавлении отзыва-->
	<?php  if (isset($info)) { ?>
		<p><?php echo $info; ?></p>
	<?php } ?>
	Отзывов на странице: <?php echo mysqli_num_rows($review) //Общее количество отзывов?>
</div>

<!--Вывод существующих отзывов-->
<form action="" method="post">
	<div id="review_button_delete">
		<input type="submit" name="review_button_delete" value="Удалить выбранные отзывы">
	</div>
<?php if(mysqli_num_rows($review)) {
     while  ($row = mysqli_fetch_assoc($review)) {
 ?>
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
						<?php echo $row['review']; ?>
					</div>
				</div>
			</td>
		
		</tr>
	</table>
</div>
<?php  
  	}
} 
?>
</form>
<!--Форма отрпавки отзыва-->
<div class="review_form">
	<h3>Тут можно оставить отзыв о сайте LoveStory!</h3>
	<form action="" method="post">
		<table>
			<tr>
				<td> Имя: </td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td> Отзыв: </td>
				<td><textarea rows="10" cols="45" name="review"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><span id="redtext"><?php echo @$error_review; ?></span></td>
			</tr>
		</table>
		<div id="review_form_submit"><input type="submit" name="submit_review" value="Отправить отзыв"></div>
	</form>
</div>