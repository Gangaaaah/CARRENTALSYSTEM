<!DOCTYPE html>
<html lang="en">
<head>
    <title>Booking Page</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .car-container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 50px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .car {
            display: flex;
            border: 1px solid #ccc;
            margin: 10px;
            padding: 10px;
            text-align: LEFT;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
        .car-details {
            flex: 1;
            padding: 60px;
        }
        .car-details h2 {
            margin: 0 0 10px;
        }
        .car-details p {
            margin: 0;
        }
       
        .car-image img {
            max-width: 100%;
            height: auto;
        }
        .book-button {
            text-align: center;
            margin-top: 10px;
        }
        .book-button button {
            background-color: green;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .selected-details {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        .selected-details h2 {
            color: #ff6600;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .selected-details p {
            margin: 5px 0;
            color: #333;
        }
    </style>
</head>
<body>
<div class="selected-details">
        <?php
            // Retrieve and display the values from the URL parameters
            $city = $_GET['city'] ?? '';
            $fromDate = $_GET['fromDate'] ?? '';
            $toDate = $_GET['toDate'] ?? '';

            if (!empty($city) && !empty($fromDate) && !empty($toDate)) {
                echo "<h2>Selected Details</h2>";
                echo "<p><strong>City:</strong> $city</p>";
                echo "<p><strong>From Date:</strong> $fromDate</p>";
                echo "<p><strong>To Date:</strong> $toDate</p>";
            } else {
                echo "<p>No details selected.</p>";
            }
        ?>
    </div>

 
    <h1>Available Cars for Booking</h1>
    <?php
    include 'connection.php'; // Ensure the connection is properly included

    $sql = "SELECT * FROM addcar";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
        
        <div class="car-container">
            <div class="car">
                <div class="car-details">
                    <h2><?php echo $row["brandname"] . " " . $row["modelname"]; ?></h2>
                    <!-- Display other car details -->
                    <p><strong>Car Code:</strong> <?php echo $row["carcode"]; ?></p>
                    <p><strong>Color:</strong> <?php echo $row["color"]; ?></p>
                    <p><strong>Registration No:</strong> <?php echo $row["registeration_no"]; ?></p>
                    <p><strong>Fuel Type:</strong> <?php echo $row["fuel_type"]; ?></p>
                    <p><strong>Seating Capacity:</strong> <?php echo $row["seating_capacity"]; ?></p>
                    <p><strong>Price:</strong>  &#x20B9 1000 per day</p>
                </div>
                <div class="car-image">
                    <?php if ($row['image_name']) { ?>
                        <img src="images/<?php echo $row['image_name']; ?>" alt="Car Image">
                    <?php } else { ?>
                        <p>No Image Available</p>
                    <?php } ?>
                    <div class="book-button">
                        <form method="POST" action="passengerdetails.php">
                            <input type="hidden" name="carcode" value="<?php echo $row['carcode']; ?>">
                            <input type="hidden" name="brand" value="<?php echo $row['brandname']; ?>">
                            <input type="hidden" name="model" value="<?php echo $row['modelname']; ?>">
                            <button type="submit">Book Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>    
    <?php
        }
    } else {
        echo "No cars available.";
    }
    ?>
</body>
</html>
