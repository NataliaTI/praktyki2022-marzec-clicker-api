<?php

   require(__DIR__.'/../interface/dataBaseInterface.php');


/*
if(isset($_GET['user_id']) && $_GET['user_id']!=""){
}
*/

function getHeaders(){

    $headers = getallheaders();
    
    $parsHeader = str_replace("Bearer ","",$headers['Authorization']);

        return $parsHeader;
}


function getHash($parsHeader){

        return $hash = hash('sha256', $parsHeader);
}

//decoding token
function getDecodedToken($parsHeader){
    $decodeJWT = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode ('.',$parsHeader )[1]))));
    $parsHeader=$decodeJWT;
    $parsHeader = json_encode($decodeJWT);//to uzyc zaraz

        return $user_id = $parsHeader;
}
  

//$user_id=32;
function readData($user_id){
      if($result = mysqli_query(openCon(),"
        SELECT status FROM `datatable` WHERE user_id=$user_id")){
 
        $row=mysqli_fetch_assoc($result);
       
        $output[]=$row['status'];
       
        $readData =json_encode($output);
    
        $data_response = array("Status"=>"Success", "Data"=>$readData);
        
        $data_response_enc = json_encode($data_response);
        
        echo $data_response_enc;
        
        closeCon(openCon());
        }
        else{ 
            header("HTTP/1.1 204 No Content");
    }
}
    
   // $user_id=32;
   
function writeData($user_id){
    if($result = mysqli_query(openCon(),"
      SELECT COUNT(`user_id`) as count FROM `datatable` WHERE `user_id` = '$user_id'"))
{
         $row = mysqli_fetch_array($result);

         $entityBody = file_get_contents('php://input');

      if ($row ['count']){
    
       $sql = "
        UPDATE datatable SET status= '$entityBody' WHERE user_id = '$user_id'";

        if(mysqli_query(openCon(), $sql))
        {
         echo "Records were updated successfully.";
      } 
      else
       {
          echo "ERROR: Could not able to execute $sql. " . mysqli_error(openCon());
        }

        closeCon(openCon());
    
         return;
    }
    else
    {
    echo 'brak takiego użytkownika';
    }
    }
    else
    {
    echo 'Brak polaczenia z baza danych';
    }

 closeCon(openCon());
}

/* methods implement */
getHeaders();
getHash(getHeaders());
getDecodedToken(getHeaders());

if($_SERVER['REQUEST_METHOD']=='GET'){
    readData(getDecodedToken());
} 
else if($_SERVER['REQUEST_METHOD']=='PUT')
{
    writeData(getDecodedToken());
}


?>
