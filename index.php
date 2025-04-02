<?php
include "database.php";
include_once "locality.php";

$database = new database();
$connection = $database->connect();

$locate = new locality($connection);
$place = $locate->locate(30);

echo($place["location_type"].' '.$place["location"]);