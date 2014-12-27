<div class="review_all">Отзывов на странице: <?php echo mysqli_num_rows($review) ?></div>

<?php if(mysqli_num_rows($review)) {
     while  ($row = mysqli_fetch_assoc($review)) {
 ?>
<div class="review_block">
	<div id="title">
		<h4>
			- <?php  echo htmlspecialchars($row['username']); ?>  
			<span id="time"><?php  echo $row['time']; ?></span>
		</h4>
	</div>
	<div id="content">
		<?php echo htmlspecialchars($row['review']);; ?>
	</div>
</div>
<?php  
  	}
} 
?>
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
		<div id="submit"><input type="submit" name="revsubmit" value="Send review"></div>
	</form>
</div>