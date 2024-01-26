<!DOCTYPE html>
<html lang="en">
<head>
    <title>Booking details</title>
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
        </style>
        </head>
    
<body>
    <h1> Booking Details</h1>
<?php

include 'connection.php'; // Include your database connection file

// Fetch data from both tables using a join query
$sql = "SELECT * FROM addcar";
$result = $connection ->query($sql);
if ($result->num_rows > 0) 
{
    while ($row=$result->fetch_assoc())
    {
        ?>
        <tr>
            <td><?php echo $row["carcode"] ;?></td>
            <td><?php echo $row["brandname"] ;?></td>
            <td><?php echo $row["modelname"] ;?></td>
            <td><?php echo $row["color"] ;?></td>
            <td><?php echo $row["registeration_no"] ;?></td>
            <td><?php echo $row["fuel_type"] ;?></td>
            <td><?php echo $row["seating_capacity"] ;?></td>
            

<?php
} 
}
else {
    echo "No records found.";
}

$conn->close();
?>