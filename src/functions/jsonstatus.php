<?php
/**
 * Setting Message and Status of JSON
 * @param $status_uuid - corresponds to information about uuid
 * @param $status_jwt - corresponds to information about jwt
 * @var $auth_message - contains information about jwt or uuid error
 * @return $auth_response - array of Status, Data and Message where Status indicates fail, Data equals null and Message correspodns to $auth_message
 */

function JSONstatus($status_uuid, $status_jwt){
    if($status_uuid == "Failed" || empty($status_uuid)){
        $auth_message = "UUID generation fail";
    }elseif($status_jwt == "Failed" || empty($status_jwt)){
        $auth_message = "JWT generation fail";
    }
    return $auth_response = array("Status"=>"Fail", "Data"=>null, "Message"=>$auth_message);
}