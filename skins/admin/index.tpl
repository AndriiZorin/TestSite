<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Admin panel LoveStory</title>
	<link rel="stylesheet" href="/skins/admin/css/style.css" media="screen"  />
	<!--Including JS-->
	<script src="/skins/admin/js/js_admin.js"></script>
	<!--Including CSS-->
	<?php if(count(Core::$CSS)) { echo implode("\n", Core::$CSS);} ?>
</head>
<body>

	<div class="header">
		<div class="cab">
			<?php  if (isset($_SESSION['user'])) { ?>
			<div id="cab_login">Учетная запись: <span id="LoveStory"><?php echo $_SESSION['user']['login']; ?></span></div>
			<div id="cab_button"><a href="/home/home">Вернуться на сайт</a></div>
			<?php } ?>
		</div>
		<div id="header_center"> 
			<div class="nav"> 
				<?php  if (isset($_SESSION['user']) && $_SESSION['user']['access'] == 1) { ?>
					<div id="nav_button"><a href="/admin/home/story">Истории</a></div>
					<div id="nav_button"><a href="/admin/home/review">Отзывы</a></div>
					<div id="nav_button"><a href="/admin/home/member">Пользователи</a></div>
				<?php } ?>
			</div>
		</div> 
	</div>	

	<div class="content">
		<!--Authoriztion to admin panel-->
		<?php 
			include './modules/admin/'.$_GET['module'].'/'.$_GET['page'].'.php';
			include './skins/admin/'.$_GET['module'].'/'.$_GET['page'].'.tpl';
		?>	 
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
			 ?>	<?php echo Core::$MYNAME; ?>
		</div>
	</div>
</body>
</html>