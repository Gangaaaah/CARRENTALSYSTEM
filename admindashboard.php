<!DOCTYPE html>
<html lang="en">
    <?php
    include 'connection.php';
    ?>
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Car Rental System</title>
    <style>
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

        /* Additional styles can be added for table, form, etc. */
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
        <li><a href="admindashboard.php">View Registered Users</a></li>
            <li><a href="addcar.html">Add Car</a></li>
            <li><a href="manage_car.php">Manage Car</a></li>
            <li><a href="deletecarr.php">delete car</a></li>
           
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="options-box">
            <section id="users">
                <h1>Registered Users</h1>
                <!-- Table to display registered users -->
                
                    <table border="1">
                        <thead>
                            <tr>
                                <th>Cust_id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>License Number</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             $sql="select * from registeration";
                             $result=$connect->query($sql);
                             if ($result->num_rows > 0) {
                        while ($row=$result->fetch_assoc())
                        {
        ?>
                            <tr>
                                <td><?php echo $row["Cust_id"];?></td>
                                <td><?php echo $row["Name"];?></td> 
                                <td><?php echo $row["Email"];?></td>
                                <td><?php echo $row["Phonenumber"];?></td>
                                <td><?php echo $row["Liscencenumber"];?></td>
                                <td><?php echo $row["address"];?></td>
                            </tr>
                            <?php
                        }
                    }
                        ?>
                            <!-- Table content will be added dynamically from backend -->
                            <!-- Fetch and populate data from backend -->
                        </tbody>
                    
                </table>
            </section>

            
            <!-- Similar sections for managing cars and bookings -->
        </div>
    </div>
</body>
</html>