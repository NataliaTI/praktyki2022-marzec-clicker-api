<?php
require('uuid.php');
$headers = array('alg'=>'HS256','typ'=>'JWT');
$payload = array($uuid);
$jwtGen = generate_jwt($headers, $payload);
function generate_jwt($headers, $payload, $secret = 'aabXXryuOOpe342bn24ldaFFGooopffgde45') {
    $headers_encoded = base64url_encode(json_encode($headers));
    $payload_encoded = base64url_encode(json_encode($payload));
    $signature = hash_hmac('SHA256', "$headers_encoded.$payload_encoded", $secret, true);
    $signature_encoded = base64url_encode($signature);
    $jwt = "$headers_encoded.$payload_encoded.$signature_encoded";
    return $jwt;
}
function base64url_encode($str) {
    return rtrim(strtr(base64_encode($str), '+/', '-_'), '=');
}
//  TESTOWE WYŚWIETLANIE GENEROWANEGO JWT
echo $jwtGen;