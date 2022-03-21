<?php
header("Content-Type:application/json");
echo 'test2';
/*
const JWT_SECRET_KEY = 'wekfuhweuoghjrwojg';

function genAccessToken() {
  const tokenPayload = { user_id };
  const accessToken = jwt.sign(tokenPayload, JWT_SECRET_KEY);
  return accessToken;
}
$user_id = genAccessToken();
response($user_id);
*/
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