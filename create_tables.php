<?php
// Assuming you have already established a connection to the MySQL database
$connection = mysqli_connect('localhost', 'root', '', 'catering');

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create the 'approve_orders' table
$sql_approve = "CREATE TABLE IF NOT EXISTS approve_orders (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
	order_id VARCHAR(50) NOT NULL,
    package VARCHAR(255) NOT NULL,
    reservation_date DATE NOT NULL,
    quantity INT(11) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    location VARCHAR(255) NOT NULL
)";

// Create the 'reject_orders' table
$sql_reject = "CREATE TABLE IF NOT EXISTS reject_orders (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
	order_id VARCHAR(50) NOT NULL,
    package VARCHAR(255) NOT NULL,
    reservation_date DATE NOT NULL,
    quantity INT(11) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    location VARCHAR(255) NOT NULL
)";

$sql_approval = "CREATE TABLE approval_status (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  order_id INT(11) NOT NULL,
  set_name VARCHAR(50) NOT NULL,
  status INT(1) NOT NULL,
  UNIQUE KEY unique_order_set (order_id, set_name)
)";


// Execute the queries to create the tables
if (
    mysqli_query($connection, $sql_approve) &&
    mysqli_query($connection, $sql_reject) &&
	mysqli_query($connection, $sql_approval)
) {
    echo "Tables created successfully!";
} else {
    echo "Error creating tables: " . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);

?>
