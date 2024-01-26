<!DOCTYPE html>
<html>
<head>
    <title>Booking Details</title>
    <style>
        /* Your CSS styles here if needed */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        /* Additional styles as per your design preferences */
    </style>
</head>
<body>
    <h1>Booking Details</h1>

    <?php
    // Database connection details (assuming you've already included connection.php)
   
    
        
        include 'connection.php';
    
        // Check if the required parameters are set in the URL
        if(isset($_GET['city']) && isset($_GET['fromDate']) && isset($_GET['toDate'])) {
            // Get the values from the URL
            $city = $_GET['city'];
            $fromDate = $_GET['fromDate'];
            $toDate = $_GET['toDate'];
    
            // Fetch booking details based on the provided parameters
            $sql = "SELECT Name, Liscencenumber FROM registeration WHERE City = '$city' AND FromDate = '$fromDate' AND ToDate = '$toDate'";
            $result = $connect->query($sql);
    
            if ($result && $result->num_rows > 0) {
                // Display the booking details in a table
        ?>
                <table border="1">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>License Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row["Name"]; ?></td>
                                <td><?php echo $row["Liscencenumber"]; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
        <?php
            } else {
                echo "No bookings found for the provided criteria.";
            }
        } else {
            echo "Please provide the necessary parameters in the URL (city, fromDate, toDate).";
        }
    
        // Close the database connection
        $connect->close();
        ?>
    </body>
    </html>
    