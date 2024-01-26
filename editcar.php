<?php
include 'connection.php';

// Check if the carcode is provided in the URL
if (isset($_GET['carcode'])) {
    $carcode = $_GET['carcode'];

    // Fetch car details based on the provided carcode
    $sql = "SELECT * FROM addcar WHERE carcode = '$carcode'";
    $result = $connect->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Display a form with existing car details for editing
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Car Details</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <h1>Edit Car Details</h1>
    <form action="updatecar.php" method="post">
        <input type="hidden" name="carcode" value="<?php echo $row['carcode']; ?>">
        <label for="brandname">Brand Name:</label>
        <input type="text" id="brandname" name="brandname" value="<?php echo $row['brandname']; ?>" required><br><br>

        <label for="modelname">Model Name:</label>
        <input type="text" id="modelname" name="modelname" value="<?php echo $row['modelname']; ?>" required><br><br>

        <label for="color">Color:</label>
        <input type="text" id="color" name="color" value="<?php echo $row['color']; ?>" required><br><br>
        
        <input type="submit" value="Update Car Details">
    </form>
</body>
</html>
<?php
    } else {
        // No car found with the given carcode
        echo "No car found with this code.";
    }
} else {
    // Car code is not provided in the URL
    echo "Car code is missing.";
}
mysqli_close($connect);
?>
