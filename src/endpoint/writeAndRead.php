<?php

require(__DIR__.'/../functions/dataBaseInterface.php');
require(__DIR__.'/../functions/jwt.php');




function getHeaders(){
    $headers = getallheaders();
    if(isset($headers['Authorization'])){
    
        $parsHeader = str_replace("Bearer ","",$headers['Authorization']);

        return $parsHeader;
    }
    else 
    {
        header("HTTP/1.1 401 Unauthorized");
    }


}


// function getHash($parsHeader){

// //print_r($hash = hash('sha256', $parsHeader));

//         return $hash = hash('sha256', $parsHeader);
// }

// //decoding token
// function getDecodedToken($parsHeader)
// {
// //print_r($parsHeader);
//   $decodeJWT = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode ('.',$parsHeader )[0]))));       
      
//         $parsHeader = json_encode($decodeJWT);

//         return $user_id = $parsHeader;
// }
  




function readData($user_id)
{

//    print_r($user_id);
    $conn = openCon();
    $stmt = $conn->query("SELECT status FROM `datatable` WHERE '$user_id'");
    
  //  $stmt = $conn->prepare($sql);
    //$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);

        if($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
         //   $row=$stmt->fetch(PDO::FETCH_ASSOC);
            
            $output[]=$row['status'];
       
            $readData =json_encode($output);
    
            $data_response = array("Status"=>"Success", "Data"=>$readData);
        
            $data_response_enc = json_encode($data_response);
        
            echo $data_response_enc;
        
            closeCon($conn);
        }
        else
        { 
            header("HTTP/1.1 401 Unauthorized");
        }
}
    

   
function writeData($user_id)
{
    $conn = openCon();
    if($stmt = $conn ->query("
    SELECT COUNT(`user_id`) as count FROM `datatable` WHERE `user_id` = '$user_id'") )
    {
   
        $row=$stmt->fetch(PDO::FETCH_ASSOC);

         $entityBody = file_get_contents('php://input');

            if ($row ['count'])
            {
                
                
                $sql = "UPDATE datatable SET status= ':entityBody' WHERE user_id = ':user_id'";
                $statement = $conn->prepare($sql);
                $statement ->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                $statement ->bindParam(':entityBody', $entityBody, PDO::PARAM_STR);
                
                if($statement->execute())
                {
                   echo "Records were updated successfully.";
                } 
                else
                {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error(openCon());
                }

            closeCon($conn);
    
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

    closeCon($conn);
}

/* methods implement */
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') 
    {
        header("HTTP/1.1 200 Ok");
        exit();
    }
    elseif(getHeaders()=='' AND $_SERVER['REQUEST_METHOD']='OPTIONS')
    {
        header("HTTP/1.1 401 Unauthorized");
        exit();
    }
    else
    {
        $getHeaders =getHeaders();

        if(is_jwt_valid($getHeaders)){
            $decodedToken = decodeToken($getHeaders);
            $decodedToken = json_decode($decodedToken);
        }
        else{
            header("HTTP/1.1 401 Unauthorized");
            exit();
        } 
        if($_SERVER['REQUEST_METHOD']=='GET')
        {
            
         //   var_dump(is_jwt_valid(getHeaders()));
      //      print_r(getDecodedToken(getHash(getHeaders())));
            readData($decodedToken[0]);
        } 
        else if($_SERVER['REQUEST_METHOD']=='PUT')
        {
            writeData($decodedToken);
        }
}

?>
