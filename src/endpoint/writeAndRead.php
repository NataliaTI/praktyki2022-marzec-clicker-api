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
    
    if($row=$stmt->fetch(PDO::FETCH_ASSOC))
    {    
        $output = json_decode($row['status'], true);
        $data_response = array("Status"=>"Success", "Data"=>$output);
        $data_response_enc = json_encode($data_response);
        
        header("HTTP/1.1 200 Ok");
        echo $data_response_enc;
    }
    else
    { 
        header("HTTP/1.1 401 Unauthorized");
    }

    $conn = null;
}


function writeData($user_id)
{
   // print_r($user_id);
    $conn = openCon();
    if($stmt = $conn ->query("SELECT COUNT(`user_id`) as count FROM `datatable` WHERE `user_id` = '$user_id'"))
    {
        $row = $stmt->fetch(PDO::PARAM_STR);
        
        if ($row['count'])
        {
            $entityBody = file_get_contents('php://input');
            $sql = 'UPDATE datatable SET status = :entityBody WHERE user_id = :user_id';
            $stmt = $conn->prepare($sql);   
            $stmt->bindValue(':user_id', $user_id);
            $stmt->bindValue(':entityBody', $entityBody); 
            $stmt = $stmt->execute();
            if($stmt)
            {
                echo "Records were updated successfully.";
            } 
            else
            {
                echo "ERROR: Could not able to execute ";
            }

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

    $conn = null;
}
//$sq = writeData("5d3e5fa7-3d35-47c5-908d-9f278160d28a");
/* methods implement */
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') 
    {
        header("HTTP/1.1 200 Ok");
        exit();
    }
    elseif(getHeaders()=='')
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
            exit;
        } 
        else if($_SERVER['REQUEST_METHOD']=='PUT')
        {
            writeData($decodedToken[0]);
            exit;
        }
}

?>
