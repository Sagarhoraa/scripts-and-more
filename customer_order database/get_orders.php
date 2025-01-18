<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "customer_order";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch customer order count
$sql = "SELECT c.customer_name, COUNT(o.order_id) as order_count 
        FROM customers c
        JOIN orders o ON c.customer_id = o.customer_id
        GROUP BY c.customer_name";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["customer_name"] . "</td><td>" . $row["order_count"] . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='2'>No orders found</td></tr>";
}

$conn->close();
?>
