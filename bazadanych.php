<?php
$mysqli = new mysqli("localhost", "root","ZAQ!2wsx","clicker");
if ($mysqli -> connect_error){
    echo "<br>Failed to connect to DB:<br>" . $mysqli->connect_error;
exit();
}
else echo "<br>Connected<br>";
$mysqli->close();
?>