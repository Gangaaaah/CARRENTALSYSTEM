<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve car details from the form submission
    $carCode = $_POST['car_code'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];

    // Redirect to the passenger details page with car details as URL parameters
    header("Location: passenger_details.php?car_code=$carCode&brand=$brand&model=$model");
    exit();
} else {
    // Handle errors or redirect to an error page
}
?>
