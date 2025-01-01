<?php
// Database configuration
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "customer"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL query to find total number of orders placed by each customer
$sql = "SELECT customers.customer_name, COUNT(orders.order_id) AS total_orders
        FROM customers
        LEFT JOIN orders ON customers.customer_id = orders.customer_id
        GROUP BY customers.customer_id, customers.customer_name";

$result = $conn->query($sql);

// Display results in a table
if ($result->num_rows > 0) {
  echo "<table>";
  echo "<tr><th>Customer Name</th><th>Total Orders</th></tr>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["customer_name"] . "</td><td>" . $row["total_orders"] . "</td></tr>";
  }
  echo "</table>";
} else {
  echo "No records found";
}

$conn->close();
?>
