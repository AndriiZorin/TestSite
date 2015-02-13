<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo hsc(Core::$META['title']); ?></title>
	<link rel="stylesheet" href="./skins/default/css/style.css" media="screen"  />
	<link rel="stylesheet" href="./skins/default/css/spec.css" media="screen" />

	<!--Including CSS and JS files-->
	<?php if(count(Core::$CSS)) { echo implode("\n", Core::$CSS);} ?>
	<?php if(count(Core::$JS)) { echo implode("\n", Core::$JS);} ?>
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
		<!--Switch beetwen pages-->
		<?php 	include $_GET['module'].'/'.$_GET['page'].'.tpl';?>	 
	</div>  

	<div class="footer"> 
		<div class="footer_bar"></div>
		<div class="footer_copyright">
			<!--Copyright-->
			<?php
				if (Core::$COPYRIGHT == date("Y")) {
					echo "&copy; ".Core::$COPYRIGHT." ";
				} else {
					echo "&copy; ".Core::$COPYRIGHT ." - ".date("Y")." ";
				}
			 ?>	
		</div>
	</div>

</body>
</html>