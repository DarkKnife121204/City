<?php
include_once "locality.php";

$locate = new locality();
$place = $locate->locate(305);

echo($place["location"].' '.$place["location_type"]);