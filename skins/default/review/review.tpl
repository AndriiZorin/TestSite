<div class="review_before_block">
	<!--Вывод о успешном добавлении отзыва-->
	<?php  if (isset($info)) {  echo '<p>'.$info.'</p>';  } ?>

	<!--Вывод Общего количества отзывов-->
	Отзывов на странице: <?php echo $review->num_rows ?>
</div>

<!--Вывод существующих отзывов-->
<?php if($review->num_rows) { while  ($row = $review->fetch_assoc()) { ?>
	<div class="review">
		<table>
			<tr>
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
<!--Форма отрпавки отзыва только для зареганых юзеров-->
<?php  if (isset($_SESSION['user'])) { ?>
	<div class="review_form">
		<h3>Тут можно оставить отзыв о сайте <span id="LoveStory_style">LoveStory</span>!</h3>
		<form action="" method="post">
			<span id="redtext"><?php echo @$error_review; ?></span>
			<textarea rows="10" cols="65" name="review"></textarea>
			<input type="submit" name="submit_review" value="Отправить отзыв">
		</form>
	</div>
<?php } else { ?>

<!--Вывод инофрмации для гостей  сайта-->
<div class="guest">
	Чтобы оставить отзыв <a href="/cabinet/authorization">войдите на сайт</a> или <a href="/cabinet/registration">зарегистрируйтесь</a><?php  }?>
</div>