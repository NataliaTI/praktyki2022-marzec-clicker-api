<?php
function segmentNum(){
    $segments = segmenting();
    $endpointSegmentNum = count($segments) - 1;
    return $endpointSegmentNum;
}
function uriParse() {
    $segments = segmenting();

    if ($segments[segmentNum()] == 'login'|| $segments[segmentNum()] == 'game-states'){
        return[
            'segments' => $segments
        ];
    }else{
        header("HTTP/1.1 404 Not Found");
    }
}

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
   
    $endpointSegmentNum = segmentNum();
   
    if (isset($url_parsed['segments'][$endpointSegmentNum])) {
        $uri_control = $url_parsed['segments'][$endpointSegmentNum];
    } 
   
    $uriTable = ROUTE_MAP;

    if(isset($uri_control) AND isset($uriTable[$uri_control])) {
        require(__DIR__.'/../endpoint/'.$uriTable[$uri_control]);
    }
}