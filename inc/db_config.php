<?php
 $host = "localhost";
 $user = "root";
 $password = "";
 $database = "car_rental";
 $db = new mysqli($host, $user, $password, $database);
//  if ($db->connect_error) {
//     die("Connection failed: " . $db->connect_error);
//  }
$admin_url = "http://localhost:8080/Mahfuzur/Car_rental/";