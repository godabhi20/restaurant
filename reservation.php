<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $date = htmlspecialchars($_POST['date']);
    $time = htmlspecialchars($_POST['time']);
    $guests = intval($_POST['guests']);

    // Validate input
    if (!empty($name) && !empty($email) && !empty($date) && !empty($time) && $guests > 0) {
        // Insert data into the database
        $sql = "INSERT INTO reservations (name, email, reservation_date, reservation_time, guests)
                VALUES ('$name', '$email', '$date', '$time', '$guests')";

        if ($conn->query($sql) === TRUE) {
            echo "<h1>Reservation Confirmed</h1>";
            echo "<p>Thank you, $name!</p>";
            echo "<p>Reservation Date: $date</p>";
            echo "<p>Time: $time</p>";
            echo "<p>Number of Guests: $guests</p>";
        } else {
            echo "<h1>Error:</h1> " . $conn->error;
        }
    } else {
        echo "<h1>Invalid Input</h1>";
        echo "<p>Please fill out all fields properly.</p>";
    }
}

// Close the database connection
$conn->close();
?>
