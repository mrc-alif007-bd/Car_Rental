<?php
include_once("../inc/db_config.php"); 
$b_id = $_GET['b_id'];


$sql = "DELETE FROM bookings WHERE booking_id =$b_id"; //"INSERT INTO manufacturer VALUES(NULL, '$name', '$address', '$contact')";
$db->query($sql);

if ($db->affected_rows) {
    // echo "<h3><b>Deleted<b></h3>";
}

header("Location:bookings.php");
?>