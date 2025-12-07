<?php

include_once("../inc/db_config.php");
 session_start();
 

 $id = $_GET['stid'];

 $sql = "DELETE FROM students WHERE employeeID= '$id'";
 $db->query($sql);
if($db->affected_rows){
session_start();
    $_SESSION['msg']='Successfully Deleted';
}

//print_r($_SESSION);

header("Location:index.php");


?>