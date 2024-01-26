<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST["code"];
    $brand = $_POST["brand"];
    $model = $_POST["model"];
    $color = $_POST["color"];
    $reg_no = $_POST["reg_no"];
    $fuel_type = $_POST["fuel_type"];
    $seating_capacity = $_POST["seating_capacity"];
    $image = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    $img_data = file_get_contents($image);

    // Prepare the SQL query with placeholders for data insertion
    $query = "INSERT INTO addcar (carcode, brandname, modelname, color, registeration_no, fuel_type, seating_capacity, car_image, image_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Prepare the statement
    $stmt = $connect->prepare($query);

    // Bind parameters and specify types
    $null = NULL;
    $stmt->bind_param("ssssssiss", $code, $brand, $model, $color, $reg_no, $fuel_type, $seating_capacity, $img_data, $image_name);
    
    // Execute the query
    $stmt->execute();

    // Check if insertion was successful
    if ($stmt->affected_rows > 0) {
        echo "Car details and image inserted successfully. <a href='admindashboard.php'>";
        
    } else {
        echo "Error inserting data: " . $connect->error;
    }

    // Close statement and connection
    $stmt->close();
    $connect->close();
}
?>