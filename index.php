<?php
error_reporting(-1);
ini_set('display_errors',1);
header('Content-Type: text/html; charset=utf-8');
session_start();

include_once './global.php'; //Global variables
include_once './lib/functions.php'; //Functions
include_once './variables.php'; //Changing variables

//Include working module + output errors
ob_start();
	include './'.Core::$APP.'/allpage.php';
	if (!file_exists('./'.Core::$APP.'/'.$_GET['module'].'/'.$_GET['page'].'.php') || !file_exists('./skins/'.Core::$VIEW.'/'.$_GET['module'].'/'.$_GET['page'].'.tpl')) {
		header("Location: /error/404");
		exit();
	}
	include './'.Core::$APP.'/'.$_GET['module'].'/'.$_GET['page'].'.php';
	include './skins/'.Core::$VIEW.'/'.$_GET['module'].'/'.$_GET['page'].'.tpl';
	$ob_content = ob_get_contents();
ob_end_clean();

include './skins/'.Core::$VIEW.'/index.tpl';
?>