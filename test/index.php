<?php

ini_set( "display_errors", 1 );
ini_set( "error_log", "./php-error.log" );

require "../vendor/autoload.php";

$HTTP = new HTTPFriend\HTTPHelper();


$HTTP->setConfigParameter( "baseURL", "/_tom/httphelper/test/" );

$HTTP->setHTML(  file_get_contents( "./index.html" )  );

$HTTP->parseHTML();

echo $HTTP->getHTML();  