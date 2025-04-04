<?php
include "database.php";
include_once "locality.php";
include_once "unique.php";
include_once "nickname.php";
include_once "address.php";

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
<h2>Поле для поиска НП по id</h2>
<div>
    <div>
        <form method="get" action="">
            <div style="margin-bottom: 15px">
                <input name="id_locate" type="number" placeholder="Введите id">
            </div>
            <div style="margin-bottom: 15px">
                <input type="submit" name="submit_locate" value="Поиск">
            </div>
        </form>
    </div>
    <div>
        <?php
            if (isset($_GET["submit_locate"])) {
                $locate = new locality($connection);
                $place = $locate->locate($_GET["id_locate"]);

                echo($place["location_type"] . ' ' . $place["location"]);
            }
        ?>
    </div>
</div>
<hr>
<h2>Поле для уникального НП и его псевдонима</h2>
<div>
    <div>
        <form method="get" action="">
            <div style="margin-bottom: 15px">
                <input name="search_unique" type="text" placeholder="Введите НП">
            </div>
            <div style="margin-bottom: 15px">
                <input type="submit" name="submit_search_unique" value="Поиск">
            </div>
        </form>
    </div>
        <?php
        if (isset($_GET["submit_search_unique"])) {
            $unique = new unique($connection);
            $uniqueId = $unique->unique($_GET["search_unique"]);


            if ($uniqueId != false) {
                $id = $uniqueId["number123"];
                echo($id.'
                    <div>
                        <form method="post" action="">
                            <div style="margin-bottom: 15px">
                                <input name="nickname_unique" type="text" placeholder="Введите Псевдоним">
                            </div>
                            <div style="margin-bottom: 15px">
                                <input type="submit" name="submit_nickname_unique" value="Ввод">
                            </div>
                        </form>
                    </div>');
                if (isset($_POST["submit_nickname_unique"])) {
                    $nickname = new nickname($connection);
                    $nickname->getNickname($_POST["nickname_unique"],$id);
                }
            } else{
                echo("Этот НП не уникальный");
            }
        }
        ?>
</div>
<hr>
<h2>Получение адреса по id</h2>
<div>
    <div>
        <form method="get" action="">
            <div style="margin-bottom: 15px">
                <input name="id_address" type="number" placeholder="Введите id">
            </div>
            <div style="margin-bottom: 15px">
                <input type="submit" name="submit_id_address" value="Поиск">
            </div>
        </form>
    </div>
    <div>
        <?php
        if (isset($_GET["submit_id_address"])) {
            $address = new address($connection);
            $direction = $address->address($_GET["id_address"]);

            foreach ($direction as $item) {
                foreach ($item as $key => $value) {
                    if (!empty($value)) {
                        echo "$value\n";
                    }
                }
            }
        }
        ?>
    </div>
</div>
<hr>
<h2>Получение адреса и id по начальному адресу </h2>
<div>
    <div>
        <form method="get" action="">
            <div style="margin-bottom: 15px">
                <input name="search_unique" type="text" placeholder="Введите НП">
            </div>
            <div style="margin-bottom: 15px">
                <input type="submit" name="submit_search_unique" value="Поиск">
            </div>
        </form>
    </div>
</div>
<hr>
<h2>Получение усеченого адреса </h2>
<div>
    <div>
        <form method="get" action="">
            <div style="margin-bottom: 15px">
                <input name="search_unique" type="text" placeholder="Введите НП">
            </div>
            <div style="margin-bottom: 15px">
                <input type="submit" name="submit_search_unique" value="Поиск">
            </div>
        </form>
    </div>
</div>
<hr><h2>Получение конкретной информации </h2>
<div>
    <div>
        <form method="get" action="">
            <div style="margin-bottom: 15px">
                <input name="search_unique" type="text" placeholder="Введите НП">
            </div>
            <div style="margin-bottom: 15px">
                <input type="submit" name="submit_search_unique" value="Поиск">
            </div>
        </form>
    </div>
</div>
<hr>
</body>
</html>


