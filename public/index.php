<?php
header("Access-Control-Allow-Origin: *");
<<<<<<< Updated upstream
=======
header("Access-Control-Allow-Headers: *");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

>>>>>>> Stashed changes
require(__DIR__.'/../src/library/router.php');
//require(__DIR__.'/../src/endpoint/writeAndRead.php');  
//__DIR__.dat();
comparison();
?>