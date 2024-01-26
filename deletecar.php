<?php
include 'connection.php';

$carcode = filter_input(INPUT_GET, 'carcode', FILTER_SANITIZE_STRING);

if (!$carcode) {
  die("Invalid car code");
}

// Fetch car details before deleting
$sql_select = "SELECT * FROM addcar WHERE carcode = ?";
$stmt_select = $connect->prepare($sql_select);
$stmt_select->bind_param("s", $carcode);
$stmt_select->execute();
$result_select = $stmt_select->get_result();

if ($result_select->num_rows > 0) {
    $row = $result_select->fetch_assoc();

    // Move car details to deletedcar table
    $sql_insert = "INSERT INTO deletedcar (carcode, brandname, modelname, color, registeration_number, fuel_type, seating_capacity) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt_insert = $connect->prepare($sql_insert);
    $stmt_insert->bind_param("ssssssi", $row['carcode'], $row['brandname'], $row['modelname'], $row['color'], $row['registeration_no'], $row['fuel_type'], $row['seating_capacity']);
    $stmt_insert->execute();

    // Delete car from addcar table
    $sql_delete = "DELETE FROM addcar WHERE carcode = ?";
    $stmt_delete = $connect->prepare($sql_delete);
    $stmt_delete->bind_param("s", $carcode);
    $stmt_delete->execute();

    // Close statements and connection
    $stmt_insert->close();
    $stmt_delete->close();
    $stmt_select->close();
    mysqli_close($connect);

    header("Location: manage_car.php?deleted=success");
    exit();
} else {
    // If no car found with the provided code
    $stmt_select->close();
    mysqli_close($connect);

    die("No car found with the provided code");
}
?>
