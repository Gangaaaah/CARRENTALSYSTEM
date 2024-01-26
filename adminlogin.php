<?php
include 'connection.php';
$password=$_POST['admin-password'];
// Prepare the SQL statement with placeholders
$sql = "SELECT * FROM user_table WHERE User_name='admin' AND pass=?";
$stmt = $connect->prepare($sql);

// Bind parameters
$stmt->bind_param('s', $password);

// Execute the statement
if ($stmt->execute()) {
    // Get the result set
    $result = $stmt->get_result();

    // Check if there is a matching user
    if ($result->num_rows > 0) {
        echo "Login successful!";
        header("Location: admindashboard.php");
        exit();
    } else {
        // Invalid username or password
        echo "Invalid username or password";
    }
} else {
    // Handle errors here
    echo "Error executing the query: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$connect->close();

?>