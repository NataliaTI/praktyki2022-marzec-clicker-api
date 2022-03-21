<?php
/*
header("Content-Type:application/json");
<<<<<<< HEAD
echo 'test2';
/*
const JWT_SECRET_KEY = 'wekfuhweuoghjrwojg';
=======
date_default_timezone_set('Europe/Warsaw');
$today = date('Y-m-d H:i:s');
//echo $today;
$headers = array('alg'=>'HS256','typ'=>'JWT');
$payload = array('usi'=>rand(1, 100000000000000000),'gat'=>$today);

$jwtGen = generate_jwt($headers, $payload);
>>>>>>> db68323842582642fb1192daa25dbb921c44bb09

echo $jwtGen;
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

include('dataBaseInterface.php');
$result = mysqli_query(
    openCon(),
    insertData($jwtGen.' WHERE user_id')
    //"INSERT INTO `dataTable` (user_id) VALUES ($jwt)"
);
/*
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