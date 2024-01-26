<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'connection.php';?>
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRzgOTFoZ7pRizesgSyno229op8rkiLzN4jUw&usqp=CAU') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: flex-start; /* Adjust to move to the left */
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
            box-shadow:0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 400px;
        }
        .container2 {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 400px;
        }

        h2 {
            color: #ff6600;
            font-size: 24px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="text"] {
            width: 98%;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .container2 {
            background-color: #fff;
            padding: 20px;

            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 400px;
        }
    </style>

</head>
<body>
    <div class="container">
        <h2>Registration GoRoam Rentals</h2>
        <?php  
         $carcode= ''; 
         $brand='';
         $model=''; 
                $carcode= $_POST['carcode']; 
                $brand=$_POST['brand'];
                $model=$_POST['model']; 
              ?>
        <form id="passenger-form" action="register.php" method="post">
            <label for="Name">Name:</label>
            <input type="text" id="Name" name="Name" required>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="licenseNumber">Driver's License Number:</label>
            <input type="text" id="licenseNumber" name="licenseNumber" required>

            <label for="Address">Address:</label>
            <input type="text" id="Address" name="Address" required>

            <input type="hidden" name="carcode" value="<?php echo $carcode; ?>">
            <input type="hidden" name="brand" value="<?php echo $brand; ?>">
            <input type="hidden" name="model" value="<?php echo $model; ?>">

            <button type="submit">Submit</button>
            
            <!-- Hidden fields to carry car information -->
            
        </form>

        <script>
           

            function redirectToPayment(carCode, brand, model) {
                window.location.href = `register.php?car_code=${carCode}&brand=${brand}&model=${model}`;
            }
        </script>
    </div>
</body>
</html>