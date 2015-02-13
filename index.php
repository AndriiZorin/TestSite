<?php
error_reporting(-1);
ini_set('display_errors',1);
header('Content-Type: text/html; charset=utf-8');
session_start();
// Configuration
include_once './global.php'; //Global variables
include_once './variables.php'; //Changing variables
//f\Functions
include_once './lib/functions.php'; 
//Connect to DB
$link = mysqli_connect(Core::$DB_LOCAL, Core::$DB_LOGIN, Core::$DB_PASS, Core::$DB_NAME);
mysqli_set_charset($link,'utf8');
//Working modules
include './modules/allpage.php';
include './modules/'.$_GET['module'].'/'.$_GET['page'].'.php';
include './skins/default/index.tpl';
?>