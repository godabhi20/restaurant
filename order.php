<?php
// order.php

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "order";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve order details from POST request
$item = isset($_POST['item']) ? $_POST['item'] : null;
$price = isset($_POST['price']) ? $_POST['price'] : null;
$order_time = date('Y-m-d H:i:s');

if ($item && $price) {
    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO orders (item, price, order_time) VALUES (?, ?, ?)");
    $stmt->bind_param("sds", $item, $price, $order_time);

    // Execute statement and check for success
    if ($stmt->execute()) {
        echo "Order placed successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
} else {
    echo "Invalid order data.";
}

// Close connection
$conn->close();
?>
