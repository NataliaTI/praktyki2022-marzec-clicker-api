<?php

// nawiazywanie polaczenia z baza danych
function openCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "ZAQ!2wsx";
 $db = "clicker";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 //zamykanie polaczenia z baza danych
function closeCon($conn)
 {
 $conn -> close();
 }
//tworzenie polecenia sql do bazy danych
 function typeData($dates){
$collect = "SELECT $dates FROM dataTable";
return $collect;
 }
//pobieranie danych z bazy danych
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
 // zapisywanie do bazy danych 
function insertData($insertData){
    $sql = "INSERT INTO dataBase VALUES ($insertData)";
if(mysqli_query(openCon(), $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error(openCon());
}
}
//szukanie po id
function find($id)
{
    $statement = "
        SELECT 
            id, userid, status
        FROM
            dataTable
        WHERE id = ?;
    ";
    if ($result = mysqli_query(openCon(), $statement)) {

        /* fetch associative array */
        while ($row = mysqli_fetch_assoc($result)) {
            printf ("%s (%s)\n", $row["$statement"]);
        }
    
        /* free result set */
        mysqli_free_result($result);
    }
}

function delete($id)
{
    $statement = "
        DELETE FROM dataTable
        WHERE id = :id;
    ";
    if (mysqli_query(openCon(), $statement)) {
        echo "Record deleted successfully";
    } else {
      echo "Error deleting record: " . mysqli_error($conn);
    }
    }
?>








