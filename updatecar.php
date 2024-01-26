<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    $carcode = mysqli_real_escape_string($connect, $_POST['carcode']);
    $brandname = mysqli_real_escape_string($connect, $_POST['brandname']);
    $modelname = mysqli_real_escape_string($connect, $_POST['modelname']);
    $color = mysqli_real_escape_string($connect, $_POST['color']);
    // Add other fields similarly

    // Update car details in the database
    $sql = "UPDATE addcar SET brandname = '$brandname', modelname = '$modelname', color = '$color' WHERE carcode = '$carcode'";

    if (mysqli_query($connect, $sql)) {
        // Redirect to manage_car.php after successful update
        header("Location: manage_car.php");
        exit();
    } else {
        echo "Error updating car details: " . mysqli_error($connect);
    }
}

mysqli_close($connect);
?>
