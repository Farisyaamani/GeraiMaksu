<?php
// Assuming you have already established a connection to the MySQL database
$connection = mysqli_connect('localhost', 'root', '', 'catering');

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to fetch and display orders based on the specified table
function displayOrders($table) {
    global $connection;

    $sql = "SELECT * FROM $table";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<h3>Orders from $table:</h3>";
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>NAME: " . $row['name'] . ", PACKAGE: " . $row['package'] . ", RESERVATION DATE: " . $row['reservation_date'] . ", QUANTITY: " . $row['quantity'] . ", PHONE NO: " . $row['phone_number'] . ", ADDRESS: " . $row['location'] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No orders found for $table.</p>";
    }
}

// Call the function to display orders from each table
displayOrders('orderFormA');
displayOrders('orderFormB');
displayOrders('orderFormC');

// Close the database connection
mysqli_close($connection);
?>
