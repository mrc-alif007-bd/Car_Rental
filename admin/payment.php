<?php
include_once("../inc/db_config.php");
session_start();

$id=$_REQUEST['id'];

$sql="UPDATE payments SET status = 'paid' WHERE payments.payment_id = '$id'";
$db->query($sql);
header("location:admin_bookings.php");

?>