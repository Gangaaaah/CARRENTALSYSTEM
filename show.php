
<?php
include 'connection.php';
$un = $_GET["uname"];
$ue = $_GET["uemail"];
$p = $_GET["signup-password"];
$cp = $_GET["confirm-password"];
// Use single quotes around string values
$query = "INSERT INTO user_table (User_name, Email, Pass) VALUES ('$un', '$ue', '$p')";
echo "REGISTERED SUCCESFULLY Click <a href='loginn.html'>here to login.</a> ";
$connect->query($query);
?>
