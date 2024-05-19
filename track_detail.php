<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Your Food Delivery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            overflow: hidden; /* Hide scrollbar */
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            animation: backgroundAnimation 20s infinite;
        }
        .content {
            position: relative;
            z-index: 1; /* Ensure content is above background */
            max-width: 800px;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            text-align: center;
        }
        input[type="text"] {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .status-container {
            margin-top: 20px;
            text-align: center;
        }
        @keyframes backgroundAnimation {
            0% { background-image: url('images/image_2.jpeg'); }
            25% { background-image: url('images/image_1.avif'); }
            50% { background-image: url('images/image_3.jpeg'); }
            75% { background-image: url('images/image_4.jpeg'); }
            100% { background-image: url('images/image_2.jpeg'); }
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>Track Your Food Delivery</h1>
        <form action="track_delivery.php" method="post">
            <label for="number">Enter your order ID:</label><br>
            <input type="text" id="number" name="number" required><br>
            <button type="submit">Track</button>
        </form>
        <div class="status-container">
            <?php
            // Check if the form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Check if order ID is set
                if (isset($_POST['number'])) {
                    $order_id = $_POST['number'];
                    // You can implement the logic to fetch delivery status based on the order ID
                    // Replace the below lines with your actual logic to fetch delivery status from your database or API
                    $delivery_status = "Out for delivery";
                    $estimated_delivery_time = "Today, 6:00 PM";
                    ?>
                    <h2>Delivery Status</h2>
                    <p><strong>Order ID:</strong> <?php echo $number; ?></p>
                    <p><strong>Status:</strong> <?php echo $delivery_status; ?></p>
                    <p><strong>Estimated Delivery Time:</strong> <?php echo $estimated_delivery_time; ?></p>
                    <?php
                    // Display the message after the track button is clicked
                    echo "<p>Your order has been placed and it will be delivered soon.</p>";
                } else {
                    echo "<p>Please enter a valid order ID.</p>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
