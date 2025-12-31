<?php
include_once("../inc/db_config.php"); 
$user_id = $_GET['user_id'];

$sql = "DELETE FROM users WHERE user_id = $user_id"; //"INSERT INTO manufacturer VALUES(NULL, '$name', '$address', '$contact')";
$db->query($sql);

if ($db->affected_rows) {
    // echo "<h3><b>Deleted<b></h3>";
}

header("Location:employees.php");
?>