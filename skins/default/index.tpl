<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo hsc(Core::$META['title']); ?></title>
	<link rel="stylesheet" href="/skins/<?php echo Core::$VIEW; ?>/css/style.css" media="screen"  />
	<link rel="stylesheet" href="/skins/<?php echo Core::$VIEW; ?>/css/spec.css" media="screen" />
	<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />

	<!--Including CSS and JS files-->
	<?php if(count(Core::$CSS)) { echo implode("\n", Core::$CSS);} ?>
	<?php if(count(Core::$JS)) { echo implode("\n", Core::$JS);} ?>
</head>
<body>

	<div class="header">
		<div class="cab">
			<?php  if (isset($_SESSION['user'])) { ?>
				<div id="cab_login">Ваш логин: <span id="LoveStory"><?php echo $_SESSION['user']['login']; ?></span></div>
				<div id="cab_login"><a href="/cabinet/exit">[ Выход ]</a></div>
				<?php  if (isset($_SESSION['user']) && $_SESSION['user']['access'] == 1) { ?>
					<div id="cab_button"><a href="/admin">Войти в админ-панель</a></div>
				<?php } ?>
			<?php } else { ?>
				<div id="cab_button"><a href="/cabinet/authorization">Войти на сайт</a></div>
				<div id="cab_button"><a href="/cabinet/registration">Создать акаунт</a></div>	
			<?php } ?>
		</div>
		<div id="header_center"> 
			<div id="header_image"></div>  
			<div class="nav"> 
				<div id="nav_button"><a href="/home/home">Главная</a></div>
				<div id="nav_button"><a href="/story/story">Истории</a></div>
				<div id="nav_button"><a href="/review/review">Отзывы</a></div>
			</div>
		</div> 
	</div>	

	<div class="content">
		<!--Switch beetwen pages-->
		<?php 	echo $ob_content; ?>	 
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
			 ?>	Андрей Зорин
		</div>
	</div>

</body>
</html>