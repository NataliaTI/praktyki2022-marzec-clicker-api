<?php
header("Access-Control-Allow-Origin: *");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require(__DIR__.'/../src/library/router.php');
//require(__DIR__.'/../src/endpoint/writeAndRead.php');  
//__DIR__.dat();
comparison();
?>