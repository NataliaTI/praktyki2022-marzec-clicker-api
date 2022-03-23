<?php
/*  ABY SPRAWDZIĆ CZY JWT ZOSTAŁ WYGENEROWANY
    SKORZYSTAJ ZE ZMIENNEJ
        $status_jwt

    ABY WYKORZYSTAĆ WYGENEROWANY JWT
    SKORZYSTAJ ZE ZMIENNEJ
        $jwtGen
*/
require('uuid.php');
/*  STATUS_JWT
    PRZYJĄŁEM, ŻE
        $status_jwt = false
        OZNACZA, ŻE
            $jwtGen
            WYGENEROWAŁ SIĘ DOBRZE
        $status_jwt = true
        OZNACZA, ŻE
            $jwtGen
            WYGENEROWAŁ SIĘ ŹLE
*/
$status_jwt;
/*  JEŚLI UUID WYGENEROWAŁO SIĘ ŹLE
    NIE MA SENSU GENEROWAĆ JWT
    W TYM WYPADKU
        $status_jwt = true
*/  
if($status_uuid == true){
    $status_jwt = true;
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
    if(isset($jwtGen)) {
        $status_jwt = false;
    } else {
        $status_jwt = true;
    }
}
//  TESTOWE: WYŚWIETLENIE $status_jwt
//echo $status_jwt;

//  TESTOWE: WYŚWIETLENIE $jwtGen
//echo $jwtGen;