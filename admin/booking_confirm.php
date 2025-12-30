<?php
include_once("../inc/db_config.php");
session_start();

$id=$_REQUEST['id'];

$sql="UPDATE bookings SET booking_status = 'Confirm' WHERE bookings.booking_id = '$id'";
$db->query($sql);
header("location:payment_table.php");

?>