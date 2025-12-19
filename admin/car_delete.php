<?php
include_once("../inc/db_config.php"); 
$car_id = $_GET['car_id'];

$sql = "DELETE FROM cars WHERE cars.car_id = $car_id"; //"INSERT INTO manufacturer VALUES(NULL, '$name', '$address', '$contact')";
$db->query($sql);

if ($db->affected_rows) {
    echo "<h3><b>Deleted<b></h3>";
}

header("Location:all_cars.php");
?>