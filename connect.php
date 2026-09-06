<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = ""; // Default is empty in XAMPP
$dbname = "shopping_cart";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $total_price = $_POST['total_price'];

    // Insert data into the orders table
    $sql = "INSERT INTO orders (name, email, contact, item_name, quantity, total_price)
            VALUES ('$name', '$email', '$contact', '$item_name', $quantity, $total_price)";

    if ($conn->query($sql) === TRUE) {
        echo "Order placed successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>