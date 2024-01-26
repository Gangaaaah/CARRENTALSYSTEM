<?php
include 'connection.php';

// Establish database connection
if (!$connect) {
  die("Connection failed: " . mysqli_connect_error());
}

// Fetch car data from database
$sql = "SELECT * FROM addcar";
$result = $connect->query($sql);

// Check for successful query execution
if (!$result) {
  die("Error fetching cars: " . mysqli_error($connect));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Cars - Admin Dashboard</title>
  </head>
<body>
  <section id="manage-cars">
    <h1>Manage Cars</h1>
    <style>
        /* ... (existing styles) ... */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Styling the sidebar */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100%;
            background-color: #333;
            color: #fff;
            padding-top: 20px;
        }

        .sidebar h2 {
            text-align: center;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            text-align: left;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .sidebar ul li a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #fff;
            transition: background-color 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #555;
        }

        /* Styling the main content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        /* Styling the box on the right side */
        .options-box {
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .main-content {
            /* Main content styles */
            margin-left: 220px; /* Considering sidebar width and padding */
        }

        .options-box {
            /* Options box styles */
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="admindashboard.php">View Registered Users</a></li>
            <li><a href="addcar.html">Add Car</a></li>
            <li><a href="manage_car.php">Manage Car</a></li>
          
        </ul>
    </div>
    <div class="main-content">
        <div class="options-box">
            <!-- Section to manage cars -->
            <section id="manage-cars">
                <h1>Manage Cars</h1>
    <table>
      <thead>
        <tr>
          <th>Car Code</th>
          <th>Brand Name</th>
          <th>Model Name</th>
          <th>Color</th>
          <th>Registration Number</th>
          <th>Fuel Type</th>
          <th>Seating Capacity</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['carcode']}</td>";
            echo "<td>{$row['brandname']}</td>";
            echo "<td>{$row['modelname']}</td>";
            echo "<td>{$row['color']}</td>";
            echo "<td>{$row['registeration_no']}</td>";
            echo "<td>{$row['fuel_type']}</td>";
            echo "<td>{$row['seating_capacity']}</td>";
            echo "<td>";
            echo "<a href='deletecar.php?carcode={$row['carcode']}'>Delete  </a>";
            echo "<a href='editcar.php?carcode={$row['carcode']}'>Edit</a>"; 
            echo "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='8'>No cars found</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </section>
  
            <!-- Other sections as needed -->
        </div>
    </div>
  <?php mysqli_close($connect); ?>

  </body>
</html>
