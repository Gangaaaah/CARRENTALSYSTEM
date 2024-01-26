<!DOCTYPE html>
<html lang="en">
<head>
    <title>Booking Page</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <h1>Available Cars for Booking</h1>
    <?php
    include 'connection.php';

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
        <div class="book-button">
            <form method="POST" action="realsummary.php">
                <input type="hidden" name="car_code" value="<?php echo $row['carcode']; ?>">
                <input type="hidden" name="brand" value="<?php echo $row['brandname']; ?>">
                <input type="hidden" name="model" value="<?php echo $row['modelname']; ?>">
                <button type="submit">Book Now</button>
            </form>
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