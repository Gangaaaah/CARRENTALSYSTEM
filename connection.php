<?php
$localhost = "127.0.0.1";
$user = "root";
$passw = "";
$dbname = "car_rental_system";

// Create connection
$connect = new mysqli($localhost, $user, $passw, $dbname);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " );
}


?>