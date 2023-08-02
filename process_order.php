<?php
// Assuming you have already established a connection to the MySQL database
$connection = mysqli_connect('localhost', 'root', '', 'catering');

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the action, order_id, and set from the AJAX request
$action = $_POST['action'];
$order_id = $_POST['order_id'];
$set = $_POST['set'];

// Escape the order_id and set to prevent SQL injection
$order_id = mysqli_real_escape_string($connection, $order_id);
$set = mysqli_real_escape_string($connection, $set);

// Construct the correct table name based on the set
$orderFormTable = 'orderForm' . strtoupper($set);

// Insert the data into the corresponding table based on the action
if ($action === 'proceed') {
    $table = 'proceed_orders';
} elseif ($action === 'approve') {
    $table = 'approve_orders';
} elseif ($action === 'reject') {
    $table = 'reject_orders';
} else {
    die("Invalid action.");
}

// Fetch data from the corresponding orderForm table using order_id
$sql = "SELECT * FROM $orderFormTable WHERE order_id = ?";
$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, 's', $order_id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Insert the data into the corresponding table using prepared statement
    $insertSql = "INSERT INTO $table (name, email, order_id, package, reservation_date, quantity, phone_number, location) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $insertStmt = mysqli_prepare($connection, $insertSql);

    mysqli_stmt_bind_param(
        $insertStmt,
        'ssssssss',
        $row['name'],
        $row['email'],
        $order_id,
        $row['package'],
        $row['reservation_date'],
        $row['quantity'],
        $row['phone_number'],
        $row['location']
    );

    if (mysqli_stmt_execute($insertStmt)) {
        // Data inserted successfully
        echo "Success";
    } else {
        // Error occurred while inserting data
        echo "Error: " . mysqli_error($connection);
        error_log("Error: " . mysqli_error($connection));
    }

    mysqli_stmt_close($insertStmt);
} else {
    // No matching order found
    echo "Error: Order not found.";
    error_log("Error: Order not found.");
}

// Close the database connection
mysqli_close($connection);
?>
