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
	<div class="review_message">
		<a href="#" onclick="showHideForm()">Нажмите сюда</a> что бы оставить отзыв о <span id="LoveStory">LoveStory</span>
	</div>
	<div id="review_form">
		<form action="" method="post">
			<h3>
				<span id="review_form_close" onclick="showHideForm()">X</span>
			</h3>
			<span id="redtext"><?php echo @$error_review; ?></span>
			<textarea rows="13" cols="35" name="review"></textarea>
			<p style="text-align: center;">
				<input type="submit" name="submit_review" value="Отправить отзыв">
			</p>
			</form>
	</div>
	<div id="review_form_overlay" onclick="showForm();"></div>

<?php } else { ?>

<!--Вывод инофрмации для гостей  сайта-->
<div class="review_message">
	Чтобы оставить отзыв <a href="/cabinet/authorization">войдите на сайт</a> или <a href="/cabinet/registration">зарегистрируйтесь</a><?php  }?>
</div>