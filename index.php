<?php
include "database.php";
include_once "locality.php";

$database = new database();
$connection = $database->connect();

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>City</title>
</head>
<body>
<form method="post" action="">
    <div style="margin-bottom: 15px">
        <input name="id_locate" type="number" placeholder="Введите id">
    </div>
    <div style="margin-bottom: 15px">
        <input type="submit" name="submit_locate" value="Поиск">
    </div>
</form>
<div>
    <?php
        if (isset($_POST["submit_locate"])) {
            $locate = new locality($connection);
            $place = $locate->locate($_POST["id_locate"]);

            echo($place["location_type"] . ' ' . $place["location"]);
        }
    ?>
</div>
</body>
</html>
