<?php
session_start();
session_destroy();

// Redirect to admin login page
header("Location:../index.php");
exit();
?>