<?php
// Connect to database
$host = "localhost";
$username = "root";
$password = "";
$database = "webtechdb";
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get average of a column
$sql = "SELECT AVG(price) as average_price FROM products";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
echo "Average price: " . $row['average_price'] . "<br>";

// Get count of rows
$sql = "SELECT COUNT(*) as total_products FROM products";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
echo "Total products: " . $row['total_products'] . "<br>";

// Get sum of a column
$sql = "SELECT SUM(price) as total_price FROM products";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
echo "Total price: " . $row['total_price'] . "<br>";

// Get minimum value of a column
$sql = "SELECT MIN(price) as min_price FROM products";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
echo "Minimum price: " . $row['min_price'] . "<br>";

// Get maximum value of a column
$sql = "SELECT MAX(price) as max_price FROM products";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
echo "Maximum price: " . $row['max_price'] . "<br>";

// Close connection
mysqli_close($conn);
?>
