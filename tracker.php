<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Delivery Tracker</title>
    <style>
        body {
            background-image: url('images/track.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif; /* Specify the desired font family */
            font-size: 24px; /* Increase the default font size */
            color: white; /* Set text color */
        }
        .container {
            text-align: center;
        }
        h1, h2 {
            font-size: 36px; /* Increase font size for headers */
            font-weight: bold;
        }
        input[type="text"],
        button {
            font-size: 18px; /* Increase font size for input and button */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Food Delivery Tracker</h1>
        <form action="track_delivery.php" method="post">
            <label for="order_id">Enter your order ID:</label>
            <input type="text" id="order_id" name="order_id" required>
            <button type="submit">Track</button>
        </form>
        <?php
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check if order ID is set
            if (isset($_POST['order_id'])) {
                $order_id = $_POST['order_id'];
                // You can implement the logic to fetch delivery status based on the order ID
                // Replace the below lines with your actual logic to fetch delivery status from your database or API
                $delivery_status = "Out for delivery";
                $estimated_delivery_time = "Today, 6:00 PM";
                ?>
                <div>
                    <h2>Delivery Status</h2>
                    <p><strong>Order ID:</strong> <?php echo $order_id; ?></p>
                    <p><strong>Status:</strong> <?php echo $delivery_status; ?></p>
                    <p><strong>Estimated Delivery Time:</strong> <?php echo $estimated_delivery_time; ?></p>
                </div>
                <?php
            } else {
                echo "<p>Please enter a valid order ID.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
