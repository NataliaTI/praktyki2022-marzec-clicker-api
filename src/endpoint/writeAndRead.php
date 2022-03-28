<?php
//require(__DIR__.'/../interface/dataBaseInterface.php');
   // ob_start
 
//   /
/*

*/
/*
if(isset($_GET['user_id']) && $_GET['user_id']!=""){
    include('dataBaseInterface.php');

        
     HMACSHA256(
         base64UrlEncode(header) + "." +
         base64UrlEncode(payload),$_GET['user_id']
    );
   /* function dat(){
     $token ="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.WyJ0ZXN0Il0.0Qbsx46QHjQtAENp_-EO5xx8P_x76XWwkNYTvubthx0";
     $decodeJWT = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $token)[1]))));
     $user_id = json_encode($decodeJWT);
     echo $user_id;    
}*/
//}

print_r(getallheaders());
$headers =getallheaders();
print_r($headers['Authorization']);  
echo '         ';
$parsHeader = str_replace("Bearer ","",$headers['Authorization']);
print_r($parsHeader);

//Odczyt stanu gry 
    $decodeJWT = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode ('.',$parsHeader )[1]))));
    $parsHeader=$decodeJWT;
    $parsHeader = json_encode($decodeJWT);
    echo "\n";
    print_r($parsHeader);
/*
    $user_id = $parsHeader;

      $result = mysqli_query(
        openCon(),
        "
        SELECT * FROM `dataTable` WHERE user_id=$user_id");
        if(mysqli_num_rows($result)>0){
            $row = mysqli_num_rows($result);
            $status = $row['status'];
            response($user_id, $status);
            closeCon(openCon());
        }else{
            header("HTTP/1.1 204 No Content");
    }

*/
 
?>
