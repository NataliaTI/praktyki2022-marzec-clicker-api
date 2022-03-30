<?php
function uriParse() {   
  
    $uri = trim($_SERVER['REQUEST_URI'], '/');
    $uri_segments = array_filter(explode('/', $uri));

    return [
        'segments' => $uri_segments,
        'segment_count' => count($uri_segments)
    ];
}   
//var_dump(uriParse());
$endpointSegmentNum = 2;
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
    $uriTable = ROUTE_MAP;

    if(isset($uri_control) AND isset($uriTable[$uri_control])) {
        require(__DIR__.'/../endpoint/'.$uriTable[$uri_control]);
    }
}
