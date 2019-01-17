<?php

ini_set( "display_errors", 1 );
ini_set( "error_log", "./php-error.log" );

require "../vendor/autoload.php";

$HTTP = new HTTPFriend\HTTPHelper();

$HTTP->setConfigParameter( "baseURL", "/_tom/httphelper/test/" );

ob_start();

require "./index2.php";

$HTTP->setHTML( ob_get_clean() );

$HTTP->parseHTML();

echo $HTTP->getHTML();  