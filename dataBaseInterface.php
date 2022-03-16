<?php

function getData(){
    $conn = mysqli_connect("localhost", "root","ZAQ!2wsx","clicker");
$sql = "SELECT * FROM dataTable;";
$result = mysqli_query($conn,$sql);
$resultCheck = mysqli_num_rows($result);
return $resultCheck;
}
$rows = getData();
if($rows > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo $row;
    }  
}



if($ques){
    echo "Barcode details Successfully Added";
} else {
    echo mysql_error();
}

?>
