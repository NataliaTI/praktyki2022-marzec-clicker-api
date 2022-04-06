<?php

/* nawiazywanie polaczenia z baza danych */

function openCon()
{
    if(!empty($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST']=='praktyki-trol-clicker-api.herokuapp.com')
    {
        $dbhost = "remotemysql.com";
        $dbuser = "qdSlF8a935";
        $dbpass = "bEsuR7hdq2";
        $db = "qdSlF8a935";
    }
    else
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "ZAQ!2wsx";
        $db = "clicker";
    }
    
    $conn = new PDO('mysql:host='.$dbhost.';dbname='.$db, $dbuser, $dbpass) or die("Connect failed: %s\n". $conn -> error);
    
    return $conn;
}

/* zamykanie polaczenia z baza danych */
function closeCon($conn)
{
    $conn->connection = null;
}

/* tworzenie polecenia sql do bazy danych */
function typeData($dates)
{
    $collect = "SELECT $dates FROM dataTable";
    
    return $collect;
}

/* pobieranie danych z bazy danych */

/* zapisywanie do bazy danych */
function insertData($uuid,$JSON_today_enc){
    $db = openCon();
    
    $sql = 'INSERT INTO datatable (user_id,status) VALUES (:uuid ,:JSON_today_enc )';

    $stmt = $db->prepare($sql);
    
    $stmt->bindValue(":uuid", $uuid, PDO::PARAM_STR);
    $stmt ->bindValue(':JSON_today_enc',$JSON_today_enc, PDO::PARAM_STR ); 
    $stmt = $stmt-> execute();
}
?>