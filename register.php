

<?php

include 'connection.php';

$name = $_POST["Name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$licenseNumber = $_POST["licenseNumber"];
$address = $_POST["Address"];
$carcode = $_POST["carcode"];
$brand = $_POST["brand"];
$model = $_POST["model"];

// First, insert into addcar table

    // Now, insert into registeration table
    $queryRegisteration = "INSERT INTO `registeration`(`Cust_id`, `Name`, `Email`, `Phonenumber`, `Liscencenumber`, `Address`, `carcode`) VALUES ('', '$name', '$email', '$phone', '$licenseNumber', '$address', '$carcode')";

    if ($connect->query($queryRegisteration) === TRUE) {
        echo "REGISTERED SUCCESSFULLY";

        // Redirect to paymentt.php while passing car details as query parameters
        header("Location: paymentt.php?name=$name&car_code=$carcode&brand=$brand&model=$model");
        exit();
    } else {
        echo "Error inserting into registeration table: " . $queryRegisteration . "<br>" . $connect->error;
    }

?>

