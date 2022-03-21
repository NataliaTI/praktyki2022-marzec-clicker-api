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
    'router.php' => 'writeAndRead.php',
    'kategoria' => 'productList'
];

function comparison(){
$url_parsed = uriParse();
$uri_control = $url_parsed['segments'][2];
$uriTable = ROUTE_MAP;
{
if(isset($uriTable[$uri_control]))
return require('C:\xampp\htdocs\Lokalne repozytorium\praktyki2022-marzec-clicker-api\writeAndRead.php');
}
}
var_dump(comparison());