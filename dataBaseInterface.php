<?php


function openCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "ZAQ!2wsx";
 $db = "clicker";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function closeCon($conn)
 {
 $conn -> close();
 }
 function typeData($dates){
$collect = "SELECT $dates FROM dataTable";
return $collect;
 }
 function collectData($tab){
 $query = $tab;
if ($result = mysqli_query(openCon(), $query)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        printf ("%s (%s)\n", $row["$tab"]);
    }

    /* free result set */
    mysqli_free_result($result);
}

/* close connection */
closeCon(openCon()); 
 }
function insertData($insertData){
    $sql = "INSERT INTO dataBase VALUES ($insertData)";
if(mysqli_query(openCon(), $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error(openCon());
}
}
?>








