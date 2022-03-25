<?php

    ob_start
 
//   

if(isset($_GET['user_id']) && $_GET['user_id']!=""){
    include('dataBaseInterface.php');

     HMACSHA256(
         base64UrlEncode(header) + "." +
         base64UrlEncode(payload),$_GET['user_id']
    );
    // $token ="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.WyI0N2I0YTUwNi03MzMyLTQ0YmQtOWQyZC1mZDQxZWU3NzY5NjEiXQ.-SPcxjpPG-j1hGePYZsb6DTd7etR7ZVtytVhKAwey1U";
    // $decodeJWT = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $token)[1]))));
    // $user_id = json_encode($decodeJWT);
    // echo $user_id;    

    $decodeJWT = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.',$_GET['user_id'] )[1]))));
    $user_id=$decodeJWT;
    $user_id = json_encode($decodeJWT);
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
//    header("HTTP/1.1 404 Not Found");
}

?>
