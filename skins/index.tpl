<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Love stories, as they are</title>
	<link rel="stylesheet" href="./css/style.css" media="screen"  />
</head>

<body>
<div class="header">
	<div id="login"><a href="index.php?page=account">Создать акаунт</a></div>
	<div id="center"> 
		<div id="image"></div>  
		<div class="navigation"> 
			<div id="navigation_button"><a href="index.php?page=home">Главная</a></div>
			<div id="navigation_button"><a href="index.php?page=story">Истории</a></div>
			<div id="navigation_button"><a href="index.php?page=review">Отзывы<a></div>
		</div>
	</div> 

</div>	
<div class="content">
	<?php 	include $_GET['page'].'.tpl'; //Переключение между страницами?>	 
</div>   
<div class="footer"> 
	<div class="footer_bar">
	
	</div>
	<div class="footer_copyright">
		<?php //copyright
			if (COPYRIGHT == CURRENTYEAR) {
				echo "&copy; ".COPYRIGHT." Андрей Зорин";
			} else {
				echo "&copy; ".COPYRIGHT ." - ".CURRENTYEAR." Андрей Зорин";
			}
		 ?>
		
	</div>
</div>
</body>

</html>