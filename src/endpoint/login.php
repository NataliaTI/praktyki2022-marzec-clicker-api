<?php
header("Content-Type:application/json");
include('jwt.php'); // ZAŁĄCZA RÓWNIEŻ uuid.php
$auth_message = "Success";
if($status_jwt == 'Failed' || empty($status_jwt)){
    if($status_uuid == 'Failed' || empty($status_uuid)){
        $auth_message = "UUID Generation fail";
    }else $auth_message = "JWT Generation fail";
    $auth_response = array("Status"=>"Fail", "Data"=>null, "Message"=>$auth_message);
    return;
}else{
    $auth_data = array("Token"=>$jwtGen);
    $auth_response = array("Status"=>"Success", "Data"=>$auth_data, "Message"=>$auth_message);
    $auth_response_enc = json_encode($auth_response);
    echo $auth_response_enc;
}
//  TERAŹNIEJSZA DATA I CZAS W UTF +1
date_default_timezone_set('Europe/Warsaw');
$today = date('Y-m-d H:i:s');
$JSON_today = array("startDatetime" => $today);
$JSON_today_enc = json_encode($JSON_today);
require(__DIR__.'/../interface/dataBaseInterface.php');
insertData("INSERT INTO datatable (user_id, status) VALUES ('".$uuid."', '".$JSON_today_enc."')");

/*  ZAPISANIE WYGENEROWANEGO INFORMACJI PO STRONIE GRY | LOCAL STORAGE!
$cookie_name = "JSON_Data";
$cookie_value = $auth_response_enc;
$cookie_expire = time()+(60*60*24*365);
setcookie($cookie_name, $cookie_value, $cookie_expire, "/");

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