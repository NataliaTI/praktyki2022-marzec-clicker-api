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

function readData($user_id)
{
    $conn = openCon();
    $stmt = $conn->query("SELECT status FROM `datatable` WHERE '$user_id'");
    
      //  if($row=$stmt->fetch(PDO::FETCH_ASSOC))
        //{    
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $output[]=$row['status'];
       
            $readData =json_encode($output);
    
            $data_response = array("Status"=>"Success", "Data"=>$readData);
        
            $data_response_enc = json_encode($data_response);
        
            echo $data_response_enc;
        
            closeCon($conn);
       // }
    //    else
        //{ 
            header("HTTP/1.1 401 Unauthorized");
      //  }
}


   
function writeData($user_id)
{
   // print_r($user_id);
    $conn = openCon();
    if($stmt = $conn ->query("SELECT COUNT(`user_id`) as count FROM `datatable` WHERE `user_id` = '$user_id'"))
    {
   
        $row=$stmt->fetch(PDO::PARAM_STR);

         $entityBody = file_get_contents('php://input');

            if ($row ['count'])
            {
                $sql = "UPDATE datatable SET status= ':entityBody' WHERE user_id = ':user_id'";
                $stmt  = $conn->prepare($sql);   
               // $stmt = $conn->prepare();
    
               $stmt->bindValue(":user_id", $user_id);
               $stmt ->bindValue(':entityBody',$entityBody); 
               $stmt = $stmt-> execute();
                if($stmt)
                {
                   echo "Records were updated successfully.";
                } 
                else
                {
                    echo "ERROR: Could not able to execute ";
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
$sq = writeData("5d3e5fa7-3d35-47c5-908d-9f278160d28a");
/* methods implement */
    if(getHeaders()=='')
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
            readData($decodedToken[0]);
        } 
        else if($_SERVER['REQUEST_METHOD']=='PUT')
        {

            writeData($decodedToken[0]);
        }
}

?>
