<!DOCTYPE html>
<html>
<?php
include 'connection.php';
?>
<head>
    <title>Admin Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: black; /* Change the background color to black */
            color: #fff;
        }
    </style>
</head>
<body>
    <h2>User Table</h2>
    <?php
        $sql="select * from user_table";
        $result=$connect->query($sql);
        if($result->num_rows > 0)
        {

        
        ?>
    <table>
        <tr>
            
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
        </tr>
        <?php
        while ($row=$result->fetch_assoc())
        {
            echo '<tr>';
            echo '<td>';
            echo $row["User_name"];
            echo '</td>';
            echo '<td>';
            echo $row["Email"];
            echo '</td>';
            echo '<td>';
            echo $row["Pass"];
         
           echo '</td>';
        }
        }
        ?>

        
    </table>

    <h2>Car Table</h2>
    <table>
        <tr>
            <th>C_Code</th>
            <th>Brand</th>
            <th>Model Name</th>
            <th>Colour</th>
            <th>Reg No</th>
            <th>Rent</th>
            <th>Purchased Date</th>
        </tr>
        <!-- Insert car data here using PHP/Database queries -->
    </table>

    <h2>Customer Details Table</h2>
    <table>
        <tr>
            <th>Cust_ID</th>
            <th>First_Name</th>
            <th>Last_Name</th>
            <th>Email</th>
            <th>Phn_No</th>
            <th>Liscence No</th>
        </tr>
        <!-- Insert customer details data here using PHP/Database queries -->
    </table>

    <h2>Rental Table</h2>
    <table>
        <tr>
            <th>Cust ID</th>
            <th>C_Code</th>
            <th>Start Date</th>
            <th>Return Date</th>
            <th>No of Days</th>
            <th>Rent</th>
            <th>Rental Status</th>
        </tr>
        <!-- Insert rental data here using PHP/Database queries -->
    </table>
</body>
</html>