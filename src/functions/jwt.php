<?php
/**
 * Generating JWT
 * @param $payload - JWT payload message
 * @return $jwt - Encoded JWT
 */
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


function is_jwt_valid($jwt, $secret = 'aabXXryuOOpe342bn24ldaFFGooopffgde45') {
	// split the jwt
	$tokenParts = explode('.', $jwt);
	$header = base64_decode($tokenParts[0]);
	$payload = base64_decode($tokenParts[1]);//
	$signature_provided = $tokenParts[2];//


	// build a signature based on the header and payload using the secret
	$base64_url_header = base64url_encode($header);//
	$base64_url_payload = base64url_encode($payload);
	$signature = hash_hmac('SHA256', $base64_url_header . "." . $base64_url_payload, $secret, true);
	$base64_url_signature = base64url_encode($signature);

	// verify it matches the signature provided in the jwt
	$is_signature_valid = ($base64_url_signature === $signature_provided);
	
	if (!$is_signature_valid) {
		return FALSE;
	} else {
		return TRUE;
	}
}
function decodeToken($jwt, $secret= 'aabXXryuOOpe342bn24ldaFFGooopffgde45'){
    $tokenParts = explode('.', $jwt);
	$payload = base64_decode($tokenParts[1]);//
return $payload;
}



