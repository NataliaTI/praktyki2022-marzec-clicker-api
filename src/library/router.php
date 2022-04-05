<?php
function segmentNum(){
    $segments = segmenting();
    $endpointSegmentNum = count($segments) - 1;
    return $endpointSegmentNum;
}
function uriParse() {
    $segments = segmenting();
    //print_r($endpointSegmentNum);
    if ($segments[segmentNum()] == 'login'|| $segments[segmentNum()] == 'game-states'){
        return[
            'segments' => $segments
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
function segmenting(){
    $uri = trim($_SERVER['REQUEST_URI'], '/');
    $uri_segments = array_filter(explode('/', $uri));
    return $uri_segments;
}

function comparison() {
    $url_parsed = uriParse();
    //print_r('eaffef');
    //print_r($endpointSegmentNum);
    $endpointSegmentNum = segmentNum();
    //print_r($url_parsed['segments'][$endpointSegmentNum]);
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