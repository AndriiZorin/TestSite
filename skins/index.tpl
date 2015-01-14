<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>LoveStory</title>
	<link rel="stylesheet" href="./css/index.css" media="screen"  />
	<link rel="stylesheet" href="./css/story.css" media="screen"  />
	<link rel="stylesheet" href="./css/review.css" media="screen"  />
	<link rel="stylesheet" href="./css/cabinet.css" media="screen"  />
</head>
<body>

<div class="header">
	<div id="login"><a href="index.php?module=cabinet&page=registration">Создать акаунт</a></div>
	<div id="header_center"> 
		<div id="header_image"></div>  
		<div class="navigation"> 
			<div id="navigation_button"><a href="index.php?module=home&page=home">Главная</a></div>
			<div id="navigation_button"><a href="index.php?module=story&page=story">Истории</a></div>
			<div id="navigation_button"><a href="index.php?module=review&page=review">Отзывы</a></div>
		</div>
	</div> 
</div>	

<div class="content">
	<?php 	include $_GET['module'].'/'.$_GET['page'].'.tpl'; //Переключение между страницами?>	 
</div>   
<div class="footer"> 
	<div class="footer_bar"></div>
	<div class="footer_copyright">
		<?php //copyright
			if (COPYRIGHT == CURRENTYEAR) {
				echo "&copy; ".COPYRIGHT." ";
			} else {
				echo "&copy; ".COPYRIGHT ." - ".CURRENTYEAR." ";
			}
		 ?>	
	</div>
</div>
</body>

</html>