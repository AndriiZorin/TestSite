<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>LoveStory</title>
	<link rel="stylesheet" href="./css/index.css" media="screen"  />
	<link rel="stylesheet" href="./css/story.css" media="screen"  />
	<link rel="stylesheet" href="./css/review.css" media="screen"  />
	<link rel="stylesheet" href="./css/cabinet.css" media="screen" />
	<link rel="stylesheet" href="./css/universal.css" media="screen" />
</head>
<body>

	<div class="header">
		<div class="cab">
			<?php  if (isset($_SESSION['user'])) { ?>
			<div id="cab_login">Ваш логин: <span id="LoveStory"><?php echo $_SESSION['user']['login']; ?></span></div>
			<div id="cab_login"><a href="index.php?module=cabinet&page=exit">[ Выход ]</a></div>
			<?php } else { ?>
			<div id="cab_button"><a href="index.php?module=cabinet&page=authorization">Войти на сайт</a></div>
			<div id="cab_button"><a href="index.php?module=cabinet&page=registration">Создать акаунт</a></div>	
			<?php } ?>
		</div>
		<div id="header_center"> 
			<div id="header_image"></div>  
			<div class="nav"> 
				<div id="nav_button"><a href="index.php?module=home&page=home">Главная</a></div>
				<div id="nav_button"><a href="index.php?module=story&page=story">Истории</a></div>
				<div id="nav_button"><a href="index.php?module=review&page=review">Отзывы</a></div>
			</div>
		</div> 
	</div>	

	<div class="content">
		<!--Переключение между страницами-->
		<?php 	include $_GET['module'].'/'.$_GET['page'].'.tpl';?>	 
	</div>  

	<div class="footer"> 
		<div class="footer_bar"></div>
		<div class="footer_copyright">
			<!--Копирайт-->
			<?php
				if (COPYRIGHT == CURRENT_YEAR) {
					echo "&copy; ".COPYRIGHT." ";
				} else {
					echo "&copy; ".COPYRIGHT ." - ".CURRENT_YEAR." ";
				}
			 ?>	
		</div>
	</div>
</body>
</html>