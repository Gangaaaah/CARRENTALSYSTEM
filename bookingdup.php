<!DOCTYPE html>
<html lang="en">
<head>
    <title>Booking Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .car-details {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 20px;
        }
        .car-details h2 {
            margin-bottom: 5px;
        }
        .car-details p {
            margin: 3px 0;
        }
        .car-image {
            max-width: 300px;
            margin-bottom: 10px;
        }
        .book-button {
            text-align: right;
            margin-top: -35px;
          
        }
.book-button button {
            background-color: green;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Available Cars for Booking</h1>
    <form id="book-now"  action="passengerdetails.html">
    <?php
        include 'connection.php'; // Ensure the connection is properly included

        $sql = "SELECT * FROM addcar";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $imagePath = $row['car_image'];
    ?>
    <div class="car-details">
        <h2><?php echo $row["brandname"] . " " . $row["modelname"]; ?></h2>
        <?php if ($imagePath && file_exists($imagePath)) { ?>
            <img src="<?php echo $imagePath; ?>" alt="Car Image" class="car-image">
        <?php } else { ?>
            <p>No Image Available</p>
        <?php } ?>
        <p><strong>Car Code:</strong> <?php echo $row["carcode"]; ?></p>
        <p><strong>Color:</strong> <?php echo $row["color"]; ?></p>
        <p><strong>Registration No:</strong> <?php echo $row["registeration_no"]; ?></p>
        <p><strong>Fuel Type:</strong> <?php echo $row["fuel_type"]; ?></p>
        <p><strong>Seating Capacity:</strong> <?php echo $row["seating_capacity"]; ?></p>
        <p><strong>Price:  &#x20B9 1000 per day</strong></p>
        <div class="book-button">
                    <button>Book Now</button>
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