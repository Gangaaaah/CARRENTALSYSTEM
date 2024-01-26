<!DOCTYPE html>
<html>
    <?php include 'connection.php';  ?>
<head>
    <title>Booking Details</title>
    <style>
        /* Your CSS styles here if needed */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .details-section {
            margin-bottom: 30px;
        }
        h2 {
            margin-bottom: 10px;
        }
        p {
            margin: 5px 0;
        }
        .cancel-btn {
            background-color: #ff0000;
            color: #ffffff;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Booking Details</h1>

    <!-- Display details from Registration table -->
    <div class='details-section'>
        <h2>User Information</h2>
        <?php
            // Retrieving data from form submission
            if(isset($_POST['name'])) {
                $name = $_POST['name'];

                // Include your database connection file
                // Assuming $connect is your database connection

                

                // Using prepared statements to prevent SQL injection
                $query2 = "SELECT * FROM registeration WHERE Name = ?";
                $stmt = $connect->prepare($query2);
                $stmt->bind_param("s", $name);
                $stmt->execute();
                $result = $stmt->get_result();

                // Fetching data and displaying it
                if ($row = $result->fetch_assoc()) {
                    echo "<p>Name: " . $row['Name'] . "</p>";
                    echo "<p>Email: " . $row['Email'] . "</p>";
                    echo "<p>Phone Number: " . $row['Phonenumber'] . "</p>";
                    echo "<p>License Number: " . $row['Liscencenumber'] . "</p>";
                    
                    // Cancel button
                    echo "<form method='post' action='deleteuser.php'>";
            echo "<input type='hidden' name='license_number' value='" . $row['Liscencenumber'] . "'>";
            echo "<input type='submit' class='cancel-btn' name='cancel_booking' value='Cancel'>";
            echo "</form>";
            }}
        ?>
<!-- Display details from Add Car table -->
<div class='details-section'>
        <h2>Car Information</h2>
        <?php
       $sqlAddCar = "SELECT a.*
       FROM addcar a
       JOIN registeration r ON a.carcode = r.carcode
       WHERE r.name = '$name'";

        $resultAddCar = $connect->query($sqlAddCar);

        if ($resultAddCar->num_rows > 0) {
            while ($rowAddCar = $resultAddCar->fetch_assoc()) {
                echo "<p>Car Code: " . $rowAddCar['carcode'] . "</p>";
                echo "<p>Brand Name: " . $rowAddCar['brandname'] . "</p>";
                echo "<p>Model Name: " . $rowAddCar['modelname'] . "</p>";
                echo "<p>Color: " . $rowAddCar['color'] . "</p>";
                echo "<p>Registration Number: " . $rowAddCar['registeration_no'] . "</p>";
                echo "<p>Fuel Type: " . $rowAddCar['fuel_type'] . "</p>";
                echo "<p>Seating Capacity: " . $rowAddCar['seating_capacity'] . "</p>";
            }
        } else {
            echo "No car records found.";
        }
        ?>
    </div>
    
</body>
</html>
