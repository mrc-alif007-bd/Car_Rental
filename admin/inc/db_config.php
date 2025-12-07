<?php
 $host = "localhost";
 $user = "root";
 $password = "";
 $database = "pawd-68";
 $db = new mysqli($host, $user, $password, $database);
//  if ($db->connect_error) {
//     die("Connection failed: " . $db->connect_error);
//  }
$admin_url = "http://localhost:8080/Mahfuzur/Admin/";
ob_start();
