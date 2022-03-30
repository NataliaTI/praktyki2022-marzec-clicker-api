<?php
/*  ABY SPRAWDZIĆ CZY JWT ZOSTAŁ WYGENEROWANY
    SKORZYSTAJ ZE ZMIENNEJ
        $status_jwt  

    ABY WYKORZYSTAĆ WYGENEROWANE UUID W TWOIM KODZIE
    SKORZYSTAJ ZE ZMIENNEJ
        $jwtGen
*/
include('uuid.php');
$status_jwt = ''; 
if($status_uuid == 'Failed' || empty($status_uuid)){
    $status_jwt = 'Failed';
    return;
}else{
    $headers = array('alg'=>'HS256','typ'=>'JWT');
    $payload = array($uuid);
    function base64url_encode($str) {
        return rtrim(strtr(base64_encode($str), '+/', '-_'), '=');
    }
    function generate_jwt($headers, $payload, $secret = 'aabXXryuOOpe342bn24ldaFFGooopffgde45') {
        $headers_encoded = base64url_encode(json_encode($headers));
        $payload_encoded = base64url_encode(json_encode($payload));
        $signature = hash_hmac('SHA256', "$headers_encoded.$payload_encoded", $secret, true);
        $signature_encoded = base64url_encode($signature);
        $jwt = "$headers_encoded.$payload_encoded.$signature_encoded";
        return $jwt;
    }
    $jwtGen = generate_jwt($headers, $payload);
    if(isset($jwtGen) && !empty($jwtGen)) {
        $status_jwt = 'Succeded';
    } else {
        $status_jwt = 'Failed';
    }
}
