<?php
 $json = json_decode(file_get_contents($url), true);
     
     
 for($i=0; $i<count($json['dane']); $i++)
{
 foreach($json['status'][$i] as $key => $value){
     if ($key == 'id') 
     {
         // Check if user exist on database
         $test = mysqli_query($conn, "SELECT id FROM dataTable WHERE id='$value'");
         if( $test && $test->num_rows )
         {
             // User exist - check if LOGO OR LOGO_SMALL OR NOTIF is other than on database
             $username = $json['dane'][$i]['SERWIS_NAME'];
             $logo = $json['dane'][$i]['LOGO'];
             $logosmall = $json['dane'][$i]['LOGO_SMALL'];
             $notify = $json['dane'][$i]['NOTIF'];
             $logotest = implode(mysqli_fetch_assoc(mysqli_query($conn, "SELECT LOGO, LOGO_SMALL, NOTIF FROM users_list WHERE SERWIS_ID='$value'")));
             // If all data is same on db and json echo success
             if($logotest == $logo and $logotest == $logosmall and $logotest == $notify)
                 {
                     echo $username." istnieje w bazie, nie trzeba aktualizowac logo<br/>";
                 }
                 else
                 // If data changed update whole user info
                 {
                     $sql = "UPDATE users_list SET LOGO='$logo', LOGO_SMALL='$logosmall', NOTIF='$notify' WHERE SERWIS_ID='$value'";
                     if (mysqli_query($conn, $sql))
                         {
                             echo $username." istnieje w bazie. Aktualizowano logo dla ".$username."!<br/>";
                         }
                     else
                         {
                              echo "Error updating record: " . mysqli_error($conn)."<br/>";
                         }
                 }
                 // If user dont exist on database insert it
         } else
         {
             $userid = $json['dane'][$i]['SERWIS_ID'];
             $username = $json['dane'][$i]['SERWIS_NAME'];
             $logo = $json['dane'][$i]['LOGO'];
             $logosmall = $json['dane'][$i]['LOGO_small'];
             $date = $json['dane'][$i]['DATE'];
             $notify = $json['dane'][$i]['NOTIF'];
             $sql4 = "INSERT INTO users_list (ID,SERWIS_ID,SERWIS_NAME,LOGO,LOGO_SMALL,DATA,NOTIF,ACTIVE) 
             VALUES ('', '$userid', '$username', '$logo', '$logosmall', '$date', '$notify', '1')";
                 if (mysqli_query($conn, $sql4))
                     {
                         // Echo success
                         echo "Dodano ".$username." do bazy danych!";
                     }
                 else
                     {
                          echo "Error updating record: " . mysqli_error($conn)."<br/>";
                     }
         }
     }
 }
?>
