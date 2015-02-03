<?php
error_reporting(-1);
ini_set('display_errors',1);
header('Content-Type: text/html; charset=utf-8');
session_start();
// Конфиг сайтa
include_once 'global.php'; //Глобальные перменные
include_once 'variables.php'; //Переменные которые будут изменяться
//Классы и функции
include_once 'lib/functions.php'; //Функции
//Подключение к БД
$link = mysqli_connect(DB_LOCAL, DB_LOGIN, DB_PASS, DB_NAME);
mysqli_set_charset($link,'utf8');
//Главный тпл-файл и рабочие модули
include 'modules/'.$_GET['module'].'/'.$_GET['page'].'.php';
include 'skins/index.tpl';
?>