<?php
header("Content-Type:application/json");
require(__DIR__.'/../functions/uuid.php');
require(__DIR__.'/../functions/stat.php');
$uuid = gen_uuid();
$status_uuid = statusChecker($uuid);

//  SPRAWDZANIE POPRAWNOŚCI WYGENEROWANIA UUID
if($status_uuid == "Succeded"){
    //  JEŚLI UUID POPRAWNIE WYGENEROWANE
    //  SPRAWDZANIE GENERACJI JWT
    require(__DIR__.'/../functions/jwt.php');
    $genJWT = generate_jwt($uuid);
    $status_jwt = statusChecker($genJWT);
    if($status_jwt == "Succeded"){
        //  JEŚLI JWT POPRAWNIE WYGENEROWANE
        //  GENERACJA ODPOWIEDZI Z TOKENEM
        $auth_data = array("Token"=>$genJWT);
        $auth_message = "Success";
        savingToDatabase($uuid);
        $auth_response = array("Status"=>"Success", "Data"=>$auth_data, "Message"=>$auth_message);
        header("HTTP/1.1 200 Ok");
    }else {
        //  JEŚLI JWT BŁĘDNIE WYGENEROWANE
        //  GENERACJA ODPOWIEDZI Z INFORMACJĄ O BŁĘDZIE
        JSONstatus($status_uuid, $status_jwt);
    }
}else{
    //  JEŚLI UUID BŁĘDNIE WYGENEROWANE
    //  GENERACJA ODPOWIEDZI Z INFORMACJĄ O BŁĘDZIE
    JSONstatus($status_uuid, null);
}

//  GENERACJA ODPOWIEZI Z INFORMACJĄ O BŁĘDZIE
function JSONstatus($status_uuid, $status_jwt){
    if($status_uuid == "Failed" || empty($status_uuid)){
        $auth_message = "UUID generation fail";
    }elseif($status_jwt == "Failed" || empty($status_jwt)){
        $auth_message = "JWT generation fail";
    }
    return $auth_response = array("Status"=>"Fail", "Data"=>null, "Message"=>$auth_message);
}

//  GENERACJA ODPOWIEDZI
$auth_response_enc = json_encode($auth_response);
echo $auth_response_enc;

//  GENERACJA CZASU I ZAPIS W BAZIE DANYCH
function savingToDatabase($uuid){
    date_default_timezone_set('Europe/Warsaw');
    $today = date('Y-m-d H:i:s');
    $JSON_today = array("startDatetime" => $today);
    $JSON_today_enc = json_encode($JSON_today);
    require(__DIR__.'/../interface/dataBaseInterface.php');
    insertData($uuid,$JSON_today_enc);
}
//  TERAŹNIEJSZA DATA I CZAS W UTF +1

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