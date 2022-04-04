<?php
define("ENV", (!empty($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST']=='praktyki-trol-clicker-api.herokuapp.com')?"production":"development");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header('Access-Control-Allow-Methods: GET, PUT, OPTIONS');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require(__DIR__.'/../src/library/router.php');
//require(__DIR__.'/../src/endpoint/writeAndRead.php');  
//__DIR__.dat();
comparison();
?>