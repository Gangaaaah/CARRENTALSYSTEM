<!DOCTYPE html>
<html lang="en">
<head>
    <title>Another Page</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <h1>Another Page</h1>

    <?php
    // Retrieving the hidden car details from the previous page
    $carCode = $_POST['car_code'] ?? '';
    $brand = $_POST['brand'] ?? '';
    $model = $_POST['model'] ?? '';

    // Displaying the retrieved car details
    if ($carCode !== '' && $brand !== '' && $model !== '') {
        echo "<p><strong>Car Code:</strong> $carCode</p>";
        echo "<p><strong>Brand:</strong> $brand</p>";
        echo "<p><strong>Model:</strong> $model</p>";
    } else {
        echo "No car details available.";
    }
    ?>

    <!-- Button to go back -->
    <a href="realsummary.php">Go Back</a>
</body>
</html>