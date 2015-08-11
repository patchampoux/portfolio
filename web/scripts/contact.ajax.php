<?php
require_once "../includes/functions.php";
require "../Class/gump.class.php";
require "../Class/phpmailer.class.php";

$msg = contactform();

$json = array();

array_push($json, $msg);

$jsonstring = json_encode($json);

echo $jsonstring;

die();