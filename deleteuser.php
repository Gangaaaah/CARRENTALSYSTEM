<?php
// deleteuser.php

include 'connection.php';

if(isset($_POST['license_number'])) {
    $licenseNumber = $_POST['license_number'];

    // Perform deletion from the database based on $licenseNumber
    $queryDelete = "DELETE FROM registeration WHERE Liscencenumber = ?";
    $stmtDelete = $connect->prepare($queryDelete);
    
    // Check if the prepare() succeeded
    if ($stmtDelete === false) {
        die('Error in preparing statement: ' . $connect->error);
    }
    
    $stmtDelete->bind_param("s", $licenseNumber);
    $stmtDelete->execute();

    // Check if the execution succeeded
    if ($stmtDelete === false) {
        die('Error in executing statement: ' . $stmtDelete->error);
    }

    // Check affected rows after deletion
    if ($stmtDelete->affected_rows > 0) {
        echo "<script>alert('Booking cancelled successfully');</script>";
    } else {
        echo "<script>alert('Cancellation failed');</script>";
    }
} else {
    echo "<script>alert('License number not provided');</script>";
}
echo "GO TO HOME <a href='home.html'>here</a>";
$connect->close();
?>
