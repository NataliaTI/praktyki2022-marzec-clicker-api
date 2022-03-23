<?php
header("Content-Type:application/json");
require('jwt.php');


/*  TERAŹNIEJSZA DATA I CZAS W UTF +1
TERAŹNIESZJĄ DATĘ NALEŻY SPRAWDZIĆ PRZY GENEROWANIU JWT
TERAŹNIEJSZĄ DATĘ PRZEKAZAĆ DO ENDPOINTA GAME-STATES

date_default_timezone_set('Europe/Warsaw');
$today = date('Y-m-d H:i:s');
echo $today;
*/

//  ZAPISANIE WYGENEROWANEGO JWT PO STRONIE GRY
/*
$cookie_name = "JWT";
$cookie_value = $jwtGen;
$cookie_expire = time()+(60*60*24*365);
setcookie($cookie_name, $cookie_value, $cookie_expire, "/");
*/

/*  DODANIE NOWEGO REKORDU DO BAZY DANYCH
    USER_ID PRZYJMUJE WARTOŚĆ WYGENEROWANEGO WCZEŚNIEJ UUID
*/
/*
    require('dataBaseInterface.php');
    $result = mysqli_query(
        openCon(),
        "INSERT INTO datatable (user_id) VALUES ($uuid)");
        closeCon(openCon());
    //   insertData("INSERT INTO datatable (user_id) VALUES (\'{$uuid}\')");
    //  "INSERT INTO `dataTable` (user_id) VALUES ($jwt)"
    


/*  WCZEŚNIEJSZY KOD TESTOWY  
if(isset($_GET['user_id']) && $_GET['user_id']!=""){
    include('dataBaseInterface.php');
    $user_id=$_GET['user_id'];
    $result = mysqli_query(
        openCon(),
        "SELECT * FROM `dataTable` WHERE user_id=$user_id");
        if(mysqli_num_rows($result)>0){
            $row = mysqli_num_rows($result);
            $status = $row['status'];
            response($user_id, $status);
            closeCon(openCon());
        }else{
            header("HTTP/1.1 204 No Content");
    }
}else{
    header("HTTP/1.1 404 Not Found");
}
function response($user_id, $status){
    $response['user_id'] = $user_id;
    $response['status'] = $status;
    $json_response = json_encode($response);
    echo $json_response; 
}
*/