<?php
header("Content-Type:application/json");

//  GENERACJA UUID
$uuid = gen_uuid();  
function gen_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
    // 32 bits for "time_low"
    mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
    
    // 16 bits for "time_mid"
    mt_rand( 0, 0xffff ),
    
    // 16 bits for "time_hi_and_version",
    // four most significant bits holds version number 4
    mt_rand( 0, 0x0fff ) | 0x4000,
    
    // 16 bits, 8 bits for "clk_seq_hi_res",
    // 8 bits for "clk_seq_low",
    // two most significant bits holds zero and one for variant DCE1.1
    mt_rand( 0, 0x3fff ) | 0x8000,
    
    // 48 bits for "node"
    mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
);
}

//  GENERACJA JWT
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
//  TESTOWE: WYŚWIETLANIE WYGENEROWANEGO JWT
echo $jwtGen;

/*  TERAŹNIEJSZA DATA I CZAS W UTF +1
    TERAŹNIESZJĄ DATĘ NALEŻY SPRAWDZIĆ PRZY GENEROWANIU JWT
    TERAŹNIEJSZĄ DATĘ PRZEKAZAĆ DO ENDPOINTA GAME-STATES

    date_default_timezone_set('Europe/Warsaw');
    $today = date('Y-m-d H:i:s');
    echo $today;
    
*/

/*  ZAPISANIE WYGENEROWANEGO JWT PO STRONIE GRY
    !DO ZROBIENIA!
*/

/*  DODANIE NOWEGO REKORDU DO BAZY DANYCH
    USER_ID PRZYJMUJE WARTOŚĆ WYGENEROWANEGO WCZEŚNIEJ UUID
    
    include('dataBaseInterface.php');
    $result = mysqli_query(
        openCon(),
        insertData('INSERT INTO `datatable` (user_id) VALUES ($uuid)')
        //"INSERT INTO `dataTable` (user_id) VALUES ($jwt)"
    );
*/

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