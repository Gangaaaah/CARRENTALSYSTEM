<?php
include 'connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the SQL statement with placeholders
    $sql = "SELECT * FROM user_table WHERE User_name=? AND pass=?";
    $stmt = $connect->prepare($sql);

    // Bind parameters
    $stmt->bind_param('ss', $username, $password);

    // Execute the statement
    if ($stmt->execute()) {
        // Get the result set
        $result = $stmt->get_result();

        // Check if there is a matching user
        if ($result->num_rows > 0) {
            // Start the session and store user information if needed
            session_start();
            $_SESSION['username'] = $username;

            // Redirect to the home page
            header("Location: home.html");
            exit();
        } else {
            // Invalid username or password
            echo "Invalid username or password";
        }
    } else {
        // Handle errors here
        echo "Error executing the query: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    // Redirect if the form is not submitted
    header("Location: loginn.html");
    exit();
}

// Close the connection
$connect->close();
?>
