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

const ROUTE_MAP = [
    'login' => 'api.php',
    'game-states' => 'writeAndRead.php'
];

function comparison(){
$url_parsed = uriParse();
$uri_control = $url_parsed['segments'][2];
$uriTable = ROUTE_MAP;
{
if(isset($uriTable[$uri_control]))

require(__DIR__.'/../endpoint/'.$uriTable[$uri_control]);
}
}