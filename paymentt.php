<!DOCTYPE html>
<html>
<head>
    <title>Payment Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('https://img.freepik.com/premium-vector/car-rental-service-rent-vehicle-automobile-cartoon-illustration_212005-189.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .navbar {
            background-color: #333;
            color: #fff;
            text-align: center; /* Center the navbar text */
            padding: 10px 0;
            width: 100%;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 20px;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 400px;
        }

        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .Make-Payment {
            text-align: right;
            margin-top: -35px;
          
        }
        .Make-Payment button {
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
    <div class="container">
        <h2>Payment Page</h2>
        <?php
            $name = isset($_GET['name']) ? $_GET['name'] : '';
            $car_code = isset($_GET['car_code']) ? $_GET['car_code'] : '';
            $brand = isset($_GET['brand']) ? $_GET['brand'] : '';
            $model = isset($_GET['model']) ? $_GET['model'] : '';
        ?>
     <form id="paymentForm" action="su.php" method="POST">
    <!-- Hidden fields to carry car information -->
    <input type="hidden" name="name" value="<?php echo $name; ?>">
    <input type="hidden" name="carcode" value="<?php echo $car_code; ?>">
    <input type="hidden" name="brand" value="<?php echo $brand; ?>">
    <input type="hidden" name="model" value="<?php echo $model; ?>">
    
    <!-- <label for="paymentMethod">Select Payment Method:</label>
    <select id="paymentMethod" name="paymentMethod" required onchange="togglePaymentDetails()">
        <option value="payNow">Pay Later</option>
        <option value="cardPayment">Card Payment</option>
        <option value="upiPayment">UPI Payment</option>
    </select> -->

    <!-- <div id="cardPaymentDetails" style="display: none;">
        <label for="cardNumber">Card Number:</label>
        <input type="text" id="cardNumber" name="cardNumber" required>

        <label for="expirationDate">Expiration Date:</label>
        <input type="text" id="expirationDate" name="expirationDate" required>

        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" required>
    </div>

    <div id="upiPaymentDetails" style="display: none;">
        <label for="upiID">UPI ID:</label>
        <input type="text" id="upiID" name="upiID" required>
    </div> -->

    <button type="submit">Make Payment</button>
</form>

<script>
    function togglePaymentDetails() {
        var paymentMethod = document.getElementById("paymentMethod").value;
        var cardDetails = document.getElementById("cardPaymentDetails");
        var upiDetails = document.getElementById("upiPaymentDetails");

        if (paymentMethod === "cardPayment") {
            cardDetails.style.display = "block";
            upiDetails.style.display = "none";
        } else if (paymentMethod === "upiPayment") {
            cardDetails.style.display = "none";
            upiDetails.style.display = "block";
        } else {
            cardDetails.style.display = "none";
            upiDetails.style.display = "none";
        }
    }
</script>

            </div>  
    </div>

    <script>
        document.getElementById('makePaymentButton').addEventListener('click', function() {
            redirectToSummary();
        });
        // JavaScript function for redirection
        function redirectToSummary() {
            window.location.href = 'su.php?name=<?php echo $name ?>&car_code=<?php echo $car_code ?>&brand=<?php echo $brand ?>&model=<?php echo $model ?>';
        }
        
        
    </script>
</body>
</html>