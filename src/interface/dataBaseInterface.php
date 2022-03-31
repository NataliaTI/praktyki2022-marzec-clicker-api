<?php

/* nawiazywanie polaczenia z baza danych */
/*if (!empty($_SERVER['HTTP_HOST']) AND $_SERVER['HTTP_HOST'] == 'domena.pl')*/
function openCon()
{
    if(!empty($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST']=='praktyki-trol-clicker-api.herokuapp.com'){
        $dbhost = "remotemysql.com";
        $dbuser = "qdSlF8a935";
        $dbpass = "bEsuR7hdq2";
        $db = "qdSlF8a935";
    }else{
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "ZAQ!2wsx";
        $db = "clicker";
    }
    
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    
    return $conn;
}

/* zamykanie polaczenia z baza danych */
function closeCon($conn)
{
    $conn -> close();
}

/* tworzenie polecenia sql do bazy danych */
function typeData($dates)
{
    $collect = "SELECT $dates FROM dataTable";
    
    return $collect;
}

/* pobieranie danych z bazy danych */
function collectData($tab){
    
    $query = $tab;
    
    if ($result = mysqli_query(openCon(), $query)) 
    {
        
        while ($row = mysqli_fetch_assoc($result))
        {
            printf ("%s (%s)\n", $row["$tab"]);
        }
        
        
        mysqli_free_result($result);
    }
    
    /* zamkniecie polaczenia */
    closeCon(openCon()); 
}
/* zapisywanie do bazy danych */
function insertData($insertData){
    
    $sql = $insertData;
    
    if(mysqli_query(openCon(), $sql)){
        //echo "Records inserted successfully.";
    } else {
        
        echo "ERROR: Could not able to execute $sql. " . mysqli_error(openCon());
        
    }
}
// /* szukanie po id */
// function find($id)
// {
    
    //     $statement = "
    //         SELECT id, userid, status FROM dataTable WHERE id = $id";
    
    //     if ($result = mysqli_query(openCon(), $statement)) {
        
        //         while ($row = mysqli_fetch_assoc($result)) {
            
            //             printf ("%s (%s)\n", $row["$statement"]);
            //         }
            
            //         mysqli_free_result($result);
            //     }
            // }
            
            // function delete($id)
            // {
                
                //     $statement = "
                //         DELETE FROM dataTable
                //         WHERE id = :id;
                //     ";
                
                //     if (mysqli_query(openCon(), $statement)) {
                    
                    //         echo "Record deleted successfully";
            
                    //     } 
                    
                    //     else {
                        
                        //         echo "Error deleting record: " . mysqli_error($conn);
                        
                        //     }
                        //     }
                        ?>