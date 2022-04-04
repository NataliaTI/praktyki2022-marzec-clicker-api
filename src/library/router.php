<?php
function segmentNum(){
    $uri = trim($_SERVER['REQUEST_URI'], '/');
    $uri_segments = array_filter(explode('/', $uri));
    $i = 0;
    foreach($uri_segments as $segments){
        $i++;
    }
    $i--;
    return $endpointSegmentNum = $i;
}
function uriParse() {   
    $uri = trim($_SERVER['REQUEST_URI'], '/');
    $uri_segments = array_filter(explode('/', $uri));
    //print_r($endpointSegmentNum);
    if ($uri_segments[segmentNum()] == 'login'|| $uri_segments[segmentNum()] == 'game-states'){
        return[
            'segments' => $uri_segments
        ];
    }else{
        header("HTTP/1.1 404 Not Found");
    }
}
//var_dump(uriParse());
const ROUTE_MAP = [
    'login' => 'login.php',
    'game-states' => 'writeAndRead.php'
];


function comparison() {
    $url_parsed = uriParse();
    //print_r('eaffef');
    //print_r($endpointSegmentNum);
    $endpointSegmentNum = segmentNum();
    print_r($url_parsed['segments'][$endpointSegmentNum]);
    if (isset($url_parsed['segments'][$endpointSegmentNum])) {
        $uri_control = $url_parsed['segments'][$endpointSegmentNum];
    } 
    //print_r($uri_control);
    //if( $uri_control =='login' OR $uri_control == 'game-states'){
    $uriTable = ROUTE_MAP;

    if(isset($uri_control) AND isset($uriTable[$uri_control])) {
        require(__DIR__.'/../endpoint/'.$uriTable[$uri_control]);
    }
}