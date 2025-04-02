<?php
class City {

}
$password = '';
$connection = mysqli_connect('localhost', 'root', $password,'city');
$query = "SELECT * FROM `cities` WHERE 1";

$final = mysqli_query($connection, $query);
if (mysqli_connect_error()) {
    echo "Error: " . mysqli_connect_error();
}
if (mysqli_num_rows($final) > 0){
    while($i = mysqli_fetch_assoc($final)) {
        echo "source: " . $i["source"];
    }
}

mysqli_close($connection);