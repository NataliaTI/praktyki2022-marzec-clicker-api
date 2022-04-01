<?php
//  DO GENERACJI JWT UŻYJ FUNKCJI
//      generate_jwt($zmienna)
//  JAKO 
//      $zmienna
//  WPISZ INFORMACJE DO PRZEKAZANIA W TOKENIE
function base64url_encode($str) {
    return rtrim(strtr(base64_encode($str), '+/', '-_'), '=');
}
function generate_jwt($payload) {
    $payloadArray = array($payload);
    $secret = 'aabXXryuOOpe342bn24ldaFFGooopffgde45';
    $headers = array('alg'=>'HS256','typ'=>'JWT');
    $headers_encoded = base64url_encode(json_encode($headers));
    $payload_encoded = base64url_encode(json_encode($payloadArray));
    $signature = hash_hmac('SHA256', "$headers_encoded.$payload_encoded", $secret, true);
    $signature_encoded = base64url_encode($signature);
    $jwt = "$headers_encoded.$payload_encoded.$signature_encoded";
    return $jwt;
}


