<?php
header("Content-Type:application/json");
require(__DIR__.'/../functions/uuid.php');
require(__DIR__.'/../functions/stat.php');
require(__DIR__.'/../functions/jsonstatus.php');
require(__DIR__.'/../functions/dateenc.php');
require(__DIR__.'/../functions/jwt.php');
require(__DIR__.'/../functions/dataBaseInterface.php');
$uuid = gen_uuid();
$status_uuid = statusChecker($uuid);
$today = dateEnc();

if($status_uuid){
    $genJWT = generate_jwt($uuid);
    $status_jwt = statusChecker($genJWT);
    if($status_jwt){
        $auth_data = array("Token"=>$genJWT);
        $auth_message = "Success";
        insertData($uuid,$today);
        $auth_response = array("Status"=>"Success", "Data"=>$auth_data, "Message"=>$auth_message);
        header("HTTP/1.1 200 Ok");
    }else {
        JSONstatus($status_uuid, $status_jwt);
    }
}else{
    JSONstatus($status_uuid, null);
}

$auth_response_enc = json_encode($auth_response);
echo $auth_response_enc;