<?php
/**
 * prapering data 
 * @return $JSON_today_enc - returns todays date
 */
function dateEnc(){
    date_default_timezone_set('Europe/Warsaw');
    $today = date('Y-m-d H:i:s');
    $JSON_today = array("startDatetime" => $today);
    return $JSON_today_enc = json_encode($JSON_today);
}