<?php
function uriParse() {   
  
        $uri = trim($_SERVER['REQUEST_URI'], '/');
        $uri_segments = array_filter(explode('/', $uri));

        if(count($uri_segments)==0){
    
            if ($uri_segments[0]=='login' OR $uri_segments[0]=='game-states'){
        return [
        'segments' => $uri_segments,
        'segment_count' => count($uri_segments)
    ];
}

 else
 {
    header("HTTP/1.1 404 Not Found");    
 }
}

 else
 {
    header("HTTP/1.1 404 Not Found");    
 }
   
}
//var_dump(uriParse());
$endpointSegmentNum = 0;
    
    if (!empty($_SERVER['HTTP_HOST']) AND $_SERVER['HTTP_HOST'] == 'praktyki-trol-clicker-api.herokuapp.com') {
    $endpointSegmentNum = 0;
}


    const ROUTE_MAP = [
    'login' => 'login.php',
    'game-states' => 'writeAndRead.php'
];


function comparison() {

    global $endpointSegmentNum;
    $url_parsed = uriParse();

    if (isset($url_parsed['segments'][$endpointSegmentNum])) {
        $uri_control = $url_parsed['segments'][$endpointSegmentNum];
    } 
    //print_r($uri_control);
  //  if( $uri_control =='login' OR $uri_control == 'game-states'){
    $uriTable = ROUTE_MAP;

    if(isset($uri_control) AND isset($uriTable[$uri_control])) {
        require(__DIR__.'/../endpoint/'.$uriTable[$uri_control]);
    }



}